<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Form\ProjetsType;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use AppBundle\Entity\Projets;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ProjetsWebController
 *
 * @author hugues
 */
class ProjetsWebController extends Controller {
    
    /**
     * @Route("/admin/projets", name="projects");
     * @Template(":admin:projets.html.twig");
     */
    public function getProjets(){
        $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:Projets', 'projets');
        $query = $em->createNativeQuery("select * from projets", $rsm);
        $project = $query->getResult();
        return array ('projects' => $project);
    }
    
     /**
     * @Route ("/admin/add",name="form")
     * @Template (":admin:addProjets.html.twig")
     * @param Request $request
     */
    public function formProjets(Request $request) {
        //on créé un objet vide
        $project = new Projets();
        //on lie un formulaire avec l'objet créé
        $f= $this->createForm(ProjetsType::class, $project);
 
        return array("formNews" => $f->createView());
      
    }
    
     /**
     * @Route ("/admin/val", name="valid")
     */
    public function addProjets(Request $request) {
       $niouzes = new Projets();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        
        $f = $this->createForm(ProjetsType::class, $niouzes);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $f->handleRequest($request);
           
        
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImages()->getClientOriginalExtension();
            $niouzes->getImages()->move('uploads/img', $nomDuFichier);
            $niouzes->setImages($nomDuFichier);
          
            
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImgPresentation()->getClientOriginalExtension();
            $niouzes->getImgPresentation()->move('uploads/img', $nomDuFichier);
            $niouzes->setimgPresentation($nomDuFichier);
            
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImgLogo()->getClientOriginalExtension();
            $niouzes->getImgLogo()->move('uploads/img', $nomDuFichier);
            $niouzes->setImgLogo($nomDuFichier);
            
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImgTemplate()->getClientOriginalExtension();
            $niouzes->getImgTemplate()->move('uploads/img', $nomDuFichier);
            $niouzes->setImgTemplate($nomDuFichier);
            
            
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($niouzes);
            $em->flush();
          
            return $this->redirectToRoute('projects');
        }
        //si jamais le post a pas marché je reviens vers l'edition
     
        return $this->redirectToRoute('form');
    }
    
   /**
    *@Route("/admin/modif/{id}", name="modif")
    *@Template(":admin:addProjets.html.twig")
    */
     public function modifProjets($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:Projets', $id);
        $f = $this->createForm(ProjetsType::class, $niouzes);
        
   
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
     
        //on renvoie le formulaire dans la vue
        return array("formNews" => $f->createView(), "id"=>$id);
     }
     
        
    /**
     *@Route("/admin/delate{id}", name="delate")
     */
     public function delateProjets($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:Projets', $id);
        $em->remove($niouzes);
        $em->flush();
        return $this->redirect($this->generateUrl('projects'));
    }
    
    /**
     *@Route("/admin/update{id}", name="update")
     */
    public function updateProjets(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:Projets', $id);
       
        //images deja uploader
        $image = $niouzes->getImages();
        $image1 = $niouzes->getImgPresentation();
        $image2 = $niouzes->getImgLogo();
        $image3 = $niouzes->getImgTemplate();
        
        $f = $this->createForm(ProjetsType::class, $niouzes);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
             
            $imagesNew = $em->find('AppBundle:Projets', $id);
            $f = $this->createForm(ProjetsType::class, $imagesNew);
            
            $f->handleRequest($request);
            
            if ($imagesNew->getImages() == null) { //on change pas d'images
                $imagesNew->setImages($image); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImages()->getClientOriginalExtension();
                $imagesNew->getImages()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImages($nomDuFichier);
            }
            
            if ($imagesNew->getImgPresentation() == null) { //on change pas d'images
                $imagesNew->setImgPresentation($image1); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImgPresentation()->getClientOriginalExtension();
                $imagesNew->getImgPresentation()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImgPresentation($nomDuFichier);
            }
            
            if ($imagesNew->getImgLogo() == null) { //on change pas d'images
                $imagesNew->setImgLogo($image2); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImgLogo()->getClientOriginalExtension();
                $imagesNew->getImgLogo()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImgLogo($nomDuFichier);
            }
            
            if ($imagesNew->getImgTemplate() == null) { //on change pas d'images
                $imagesNew->setImgTemplate($image3); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImgTemplate()->getClientOriginalExtension();
                $imagesNew->getImgTemplate()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImgTemplate($nomDuFichier);
            }
            
            
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($imagesNew);
            $em->flush();
            
            return $this->redirect($this->generateUrl('projects'));
            
        }
}

 /**
     * @Route("/admin/publicationweb/{id}", name="publiweb")
     */
     public function ajouterSiteWeb($id){
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:Projets', $id);
        $this->createForm(ProjetsType::class, $niouzes);
        
        $niouzes->setPublier(1);
          
         $em->merge($niouzes);
         $em->flush();
         
         return $this->redirectToRoute('projects');
     }
     
      /**
     * @Route("/admin/projets/web/detail/{id}", name="detailprojetsweb");
     * @Template(":admin:projetsDetailWeb.html.twig");
     */
    public function afficheProjetsWeb($id){
        return array ('projects' => $this->getDoctrine()->getRepository('AppBundle:Projets')->findById($id));
    }
    
}
