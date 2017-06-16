<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\ImagesCaroussel;
use AppBundle\Form\ImagesCarousselType;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of Carousel
 *
 * @author hugues
 */
class CarouselController extends Controller {
    
        /**
     * @Route("/admin/caroussel", name="projectscaroussel");
     * @Template(":admin:caroussel.html.twig");
     */
    public function getProjetsCaroussel(){
        $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:ImagesCaroussel', 'projetscaroussel');
        $query = $em->createNativeQuery("select * from images_caroussel", $rsm);
        $projectcaroussel = $query->getResult();
        return array ('projectscaroussel' => $projectcaroussel);
    }
    
      /**
     * @Route ("/admin/addcaroussel",name="formcaroussel")
     * @Template (":admin:addCaroussel.html.twig")
     * @param Request $request
     */
    public function formProjetsCaroussel(Request $request) {
        //on créé un objet vide
        $projectcaroussel = new ImagesCaroussel();
        //on lie un formulaire avec l'objet créé
        $f= $this->createForm(ImagesCarousselType::class, $projectcaroussel);
       
        return array("formNewsCaroussel" => $f->createView());
    }
    
     /**
     * @Route ("/admin/valcaroussel", name="validcaroussel")
     */
    public function addProjetsCaroussel(Request $request) {
       $niouzes = new ImagesCaroussel();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        
        $f = $this->createForm(ImagesCarousselType::class, $niouzes);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $f->handleRequest($request);
           
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImages()->getClientOriginalExtension();
            $niouzes->getImages()->move('uploads/img', $nomDuFichier);
            $niouzes->setImages($nomDuFichier);
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($niouzes);
            $em->flush();
            //J'avoue n'avoir implementer aucun test pour m'assurer de la validité des données en database
            //quoi qu'il en soit après avoir ajouter une news on appele la methode qui va nous afficher la liste des news
            //Bien entendu j'utilise les alias pour le routage ;) 
            //faire un redirect vers getNews();
            return $this->redirectToRoute('projectscaroussel');
        }
        //si jamais le post a pas marché je reviens vers l'edition
        //faire un redirect sur ajout de news
        return $this->redirectToRoute('formcaroussel');
    }
    
      /**
    *@Route("/admin/modifcaroussel/{id}", name="modifcaroussel")
    *@Template(":admin:addCaroussel.html.twig")
    */
     public function modifProjetsCaroussel($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ImagesCaroussel', $id);
         $f = $this->createForm(ImagesCarousselType::class, $niouzes);
        //on renvoie le formulaire dans la vue
        return array("formNewsCaroussel" => $f->createView(), "id"=>$id);
    }
    
     /**
     *@Route("/admin/delatecaroussel/{id}", name="delatecaroussel")
     */
     public function delateProjetsCaroussel($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ImagesCaroussel', $id);
        $em->remove($niouzes);
        $em->flush();
        return $this->redirect($this->generateUrl('projectscaroussel'));
    }
    
     /**
     *@Route("/admin/updatecaroussel/{id}", name="updatecaroussel")
     */
    public function updateNewsCaroussel(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ImagesCaroussel', $id);
       
        $image = $niouzes->getImages();
        $f = $this->createForm(ImagesCarousselType::class, $niouzes);
      
        if ($request->getMethod() == 'POST') {
          
            $imagesNew = $em->find('AppBundle:ImagesCaroussel', $id);
            $f = $this->createForm(ImagesCarousselType::class, $imagesNew);
            
            $f->handleRequest($request);
            
             if ($imagesNew->getImages() == null) { //on change pas d'images
                $imagesNew->setImages($image); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImages()->getClientOriginalExtension();
                $imagesNew->getImages()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImages($nomDuFichier);
            }
//  
//            
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($imagesNew);
            $em->flush();
            
            return $this->redirect($this->generateUrl('projectscaroussel'));
            
        }
}
       
    /**
     * @Route("/admin/publication/{id}", name="publi")
     */
     public function ajouterSiteCaroussel($id){
         $em = $this->getDoctrine()->getEntityManager();
         $niouzes = $em->find('AppBundle:ImagesCaroussel', $id);
         $this->createForm(ImagesCarousselType::class, $niouzes);
         
         $niouzes->setPublier(1);
         
         $em->merge($niouzes);
         $em->flush();
         return $this->redirectToRoute('projectscaroussel');
        
     }
     
}
