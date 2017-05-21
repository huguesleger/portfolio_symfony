<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Galerie;
use AppBundle\Form\GalerieType;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of GalerieController
 *
 * @author hugues
 */
class GalerieController  extends Controller{
    
       /**
     * @Route("/admin/galerie", name="projectsgal");
     * @Template(":admin:galerie.html.twig");
     */
    public function getGalerie(){
        $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:Galerie', 'galerie');
        $query = $em->createNativeQuery("select * from galerie", $rsm);
        $galerie = $query->getResult();
        return array ('projectsgal' => $galerie);
    }
    
     /**
     * @Route ("/admin/addgalerie",name="formgalerie")
     * @Template (":admin:addGalerie.html.twig")
     * @param Request $request
     */
    public function formGalerie(Request $request) {
        //on créé un objet vide
        $galerie = new Galerie();
        //on lie un formulaire avec l'objet créé
        $f= $this->createForm(GalerieType::class, $galerie);
 
            return array("formNewsGalerie" => $f->createView());
      
    }
    
     /**
     * @Route ("/admin/valgalerie", name="validgal")
     */
    public function addGalerie(Request $request) {
       $gal = new Galerie();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        
        $f = $this->createForm(GalerieType::class, $gal);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $f->handleRequest($request);
           
            $nomDuFichier = md5(uniqid()).".".$gal->getImageMin()->getClientOriginalExtension();
            $gal->getImageMin()->move('uploads/img', $nomDuFichier);
            $gal->setImageMin($nomDuFichier);
            
            
            $nomDuFichier = md5(uniqid()).".".$gal->getImageDetail()->getClientOriginalExtension();
            $gal->getImageDetail()->move('uploads/img', $nomDuFichier);
            $gal->setImageDetail($nomDuFichier);
            
            $nomDuFichier = md5(uniqid()).".".$gal->getImageDetail1()->getClientOriginalExtension();
            $gal->getImageDetail1()->move('uploads/img', $nomDuFichier);
            $gal->setImageDetail1($nomDuFichier);
            
            $nomDuFichier = md5(uniqid()).".".$gal->getImageDetail2()->getClientOriginalExtension();
            $gal->getImageDetail2()->move('uploads/img', $nomDuFichier);
            $gal->setImageDetail2($nomDuFichier);
            
             
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($gal);
            $em->flush();
            //J'avoue n'avoir implementer aucun test pour m'assurer de la validité des données en database
            //quoi qu'il en soit après avoir ajouter une news on appele la methode qui va nous afficher la liste des news
            //Bien entendu j'utilise les alias pour le routage ;) 
            //faire un redirect vers getNews();
            return $this->redirectToRoute('projectsgal');
        }
        //si jamais le post a pas marché je reviens vers l'edition
        //faire un redirect sur ajout de news
        return $this->redirectToRoute('formgalerie');
    }
    
    
     /**
    *@Route("/admin/modifgalerie/{id}", name="modifgal")
    *@Template(":admin:addGalerie.html.twig")
    */
     public function modifGalerie($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $gal = $em->find('AppBundle:Galerie', $id);
         $f = $this->createForm(GalerieType::class, $gal);
        //on renvoie le formulaire dans la vue
        return array("formNewsGalerie" => $f->createView(), "id"=>$id);
    }
    
     /**
     *@Route("/admin/delategalerie/{id}", name="delategal")
     */
     public function delateGalerie($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $gal = $em->find('AppBundle:Galerie', $id);
        $em->remove($gal);
        $em->flush();
        return $this->redirect($this->generateUrl('projectsgal'));
    }
    
       /**
     *@Route("/admin/updategalerie/{id}", name="updategal")
     */
    public function updateGalerie(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $gal = $em->find('AppBundle:Galerie', $id);
        
        $image = $gal->getImageMin();
        $image1 = $gal->getImageDetail();
        $image2 = $gal->getImageDetail1();
        $image3 = $gal->getImageDetail2();
        
        $f = $this->createForm(GalerieType::class, $gal);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            
            $imagesNew = $em->find('AppBundle:Galerie', $id);
            $f = $this->createForm(GalerieType::class, $imagesNew);
            
            $f->handleRequest($request);
            
            if ($imagesNew->getImageMin() == null) { //on change pas d'images
                $imagesNew->setImageMin($image); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImageMin()->getClientOriginalExtension();
                $imagesNew->getImageMin()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImageMin($nomDuFichier);
            }
            
            if ($imagesNew->getImageDetail() == null) { //on change pas d'images
                $imagesNew->setImageDetail($image1); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImageDetail()->getClientOriginalExtension();
                $imagesNew->getImageDetail()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImageDetail($nomDuFichier);
            }
            
            if ($imagesNew->getImageDetail1() == null) { //on change pas d'images
                $imagesNew->setImageDetail1($image2); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImageDetail1()->getClientOriginalExtension();
                $imagesNew->getImageDetail1()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImageDetail1($nomDuFichier);
            }
            
            if ($imagesNew->getImageDetail2() == null) { //on change pas d'images
                $imagesNew->setImageDetail2($image3); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImageDetail2()->getClientOriginalExtension();
                $imagesNew->getImageDetail2()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImageDetail2($nomDuFichier);
            }
//          
            
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($imagesNew);
            $em->flush();
            
            return $this->redirect($this->generateUrl('projectsgal'));
            
        }
    }
    
    /**
     * @Route("/admin/publicationgalerie/{id}", name="publigal")
     */
     public function ajouterSiteGalerie($id){
         $em = $this->getDoctrine()->getEntityManager();
         $gal = $em->find('AppBundle:Galerie', $id);
         $this->createForm(GalerieType::class, $gal);
         
          $gal->setPublier(1);
          
         $em->merge($gal);
         $em->flush();
         return $this->redirectToRoute('projectsgal');
     }
     
}
