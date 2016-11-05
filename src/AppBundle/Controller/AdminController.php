<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ImagesCaroussel;
use AppBundle\Entity\Projets;
use AppBundle\Entity\ProjetsDetail;
use AppBundle\Entity\ProjetsPrint;
use AppBundle\Form\ImagesCarousselType;
use AppBundle\Form\ProjetsDetailType;
use AppBundle\Form\ProjetsPrintType;
use AppBundle\Form\ProjetsType;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/**
 * Description of AdminController
 *
 * @author hugues
 */
class AdminController extends Controller {

    /**
     * @Route("/admin", name="admin");
     * @Template(":admin:index.html.twig");
     */
    public function homeAdmin(){
        
    }
    
    
    
    
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
            
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImgtemplate()->getClientOriginalExtension();
            $niouzes->getImgtemplate()->move('uploads/img', $nomDuFichier);
            $niouzes->setImgtemplate($nomDuFichier);
            
            
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($niouzes);
            $em->flush();
            //J'avoue n'avoir implementer aucun test pour m'assurer de la validité des données en database
            //quoi qu'il en soit après avoir ajouter une news on appele la methode qui va nous afficher la liste des news
            //Bien entendu j'utilise les alias pour le routage ;) 
            //faire un redirect vers getNews();
            return $this->redirectToRoute('projects');
        }
        //si jamais le post a pas marché je reviens vers l'edition
        //faire un redirect sur ajout de news
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
            
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($niouzes);
            $em->flush();
            
            return $this->redirect($this->generateUrl('projects'));
            
        }
}


  /**
     * @Route("/admin/print", name="projectsprint");
     * @Template(":admin:print.html.twig");
     */
    public function getProjetsPrint(){
        $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:ProjetsPrint', 'projetsprint');
        $query = $em->createNativeQuery("select * from projets_print", $rsm);
        $projectprint = $query->getResult();
        return array ('projectsprint' => $projectprint);
    }

    
      /**
     * @Route ("/admin/addprint",name="formprint")
     * @Template (":admin:addPrint.html.twig")
     * @param Request $request
     */
    public function formProjetsPrint(Request $request) {
        //on créé un objet vide
        $projectprint = new ProjetsPrint();
        //on lie un formulaire avec l'objet créé
        $f= $this->createForm(ProjetsPrintType::class, $projectprint);
       
        return array("formNewsPrint" => $f->createView());
    }


     /**
     * @Route ("/admin/valprint", name="validprint")
     */
    public function addProjetsPrint(Request $request) {
       $niouzes = new ProjetsPrint();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        
        $f = $this->createForm(ProjetsPrintType::class, $niouzes);
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
            return $this->redirectToRoute('projectsprint');
        }
        //si jamais le post a pas marché je reviens vers l'edition
        //faire un redirect sur ajout de news
        return $this->redirectToRoute('formprint');
    }

     /**
    *@Route("/admin/modifprint/{id}", name="modifprint")
    *@Template(":admin:addPrint.html.twig")
    */
     public function modifProjetsPrint($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ProjetsPrint', $id);
         $f = $this->createForm(ProjetsPrintType::class, $niouzes);
        //on renvoie le formulaire dans la vue
        return array("formNewsPrint" => $f->createView(), "id"=>$id);
    }
    
     /**
     *@Route("/admin/delateprint/{id}", name="delateprint")
     */
     public function delateProjetsPrint($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ProjetsPrint', $id);
        $em->remove($niouzes);
        $em->flush();
        return $this->redirect($this->generateUrl('projectsprint'));
    }
    
      /**
     *@Route("/admin/updateprint/{id}", name="updateprint")
     */
    public function updateNewsPrint(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ProjetsPrint', $id);
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        $f = $this->createForm(ProjetsPrintType::class, $niouzes);
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
            $em->merge($niouzes);
            $em->flush();
            
            return $this->redirect($this->generateUrl('projectsprint'));
            
        }
}


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
            $em->merge($niouzes);
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
     
     /**
     * @Route("/admin/publicationprint/{id}", name="publiprint")
     */
     public function ajouterSitePrint($id){
         $em = $this->getDoctrine()->getEntityManager();
         $niouzes = $em->find('AppBundle:ProjetsPrint', $id);
         $this->createForm(ProjetsPrintType::class, $niouzes);
         
          $niouzes->setPublier(1);
          
         $em->merge($niouzes);
         $em->flush();
         return $this->redirectToRoute('projectsprint');
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
     * @Route("/admin/supprimercaroussel/{id}", name="suppcaroussel")
     */
     public function supprimerSiteCaroussel($id){
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ImagesCaroussel', $id);
        $this->createForm(ImagesCarousselType::class, $niouzes);
        
        $niouzes->setPublier(0);
          
         $em->merge($niouzes);
         $em->flush();
         
         return $this->redirectToRoute('projectscaroussel');
     }
     
     /**
     * @Route("/admin/supprimerweb/{id}", name="suppweb")
     */
     public function supprimerSiteWeb($id){
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:Projets', $id);
        $this->createForm(ProjetsType::class, $niouzes);
        
        $niouzes->setPublier(0);
          
         $em->merge($niouzes);
         $em->flush();
         
         return $this->redirectToRoute('projects');
     }
     
     /**
     * @Route("/admin/supprimerprint/{id}", name="suppprint")
     */
     public function supprimerSitePrint($id){
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ProjetsPrint', $id);
        $this->createForm(ProjetsPrintType::class, $niouzes);
        
        $niouzes->setPublier(0);
          
         $em->merge($niouzes);
         $em->flush();
         
         return $this->redirectToRoute('projectsprint');
     }
     
      /**
     * @Route("/admin/projets/detail", name="projectsdetail");
     * @Template(":admin:projetsDetail.html.twig");
     */
    public function getProjetsDetail(){
        $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:ProjetsDetail', 'projetsdetail');
        $query = $em->createNativeQuery("select * from projets_detail", $rsm);
        $project = $query->getResult();
        return array ('projectsdetail' => $project);
    }
     
     /**
     * @Route ("/admin/add/detail",name="formdetail")
     * @Template (":admin:addProjetsDetail.html.twig")
     * @param Request $request
     */
    public function formProjetsDetail(Request $request) {
        //on créé un objet vide
        $project = new ProjetsDetail();
        //on lie un formulaire avec l'objet créé
        $f= $this->createForm(ProjetsDetailType::class, $project);
       
        return array("formNewsDetail" => $f->createView());
    }
    
     /**
     * @Route ("/admin/val/detail", name="validdetail")
     */
    public function addProjetsDetail(Request $request) {
       $niouzes = new ProjetsDetail();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        
        $f = $this->createForm(ProjetsDetailType::class, $niouzes);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $f->handleRequest($request);
           
//            $nomDuFichier = md5(uniqid()).".".$niouzes->getImages()->getClientOriginalExtension();
//            $niouzes->getImages()->move('uploads/img', $nomDuFichier);
//            $niouzes->setImages($nomDuFichier);
//            
//            $nomDuFichier = md5(uniqid()).".".$niouzes->getImgtemplate()->getClientOriginalExtension();
//            $niouzes->getImgtemplate()->move('uploads/img', $nomDuFichier);
//            $niouzes->setImgtemplate($nomDuFichier);
            
            
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($niouzes);
            $em->flush();
            //J'avoue n'avoir implementer aucun test pour m'assurer de la validité des données en database
            //quoi qu'il en soit après avoir ajouter une news on appele la methode qui va nous afficher la liste des news
            //Bien entendu j'utilise les alias pour le routage ;) 
            //faire un redirect vers getNews();
            return $this->redirectToRoute('projectsdetail');
        }
        //si jamais le post a pas marché je reviens vers l'edition
        //faire un redirect sur ajout de news
        return $this->redirectToRoute('formdetail');
    }
    
   /**
    *@Route("/admin/modif/detail/{id}", name="modifdetail")
    *@Template(":admin:addProjetsDetail.html.twig")
    */
     public function modifProjetsDetail($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ProjetsDetail', $id);
        $f = $this->createForm(ProjetsDetailType::class, $niouzes);
       
        //on renvoie le formulaire dans la vue
        return array("formNewsDetail" => $f->createView(), "id"=>$id);
    }
    
    /**
     *@Route("/admin/delate/detail/{id}", name="delatedetail")
     */
     public function delateProjetsDetail($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ProjetsDetail', $id);
        $em->remove($niouzes);
        $em->flush();
        return $this->redirect($this->generateUrl('projectsdetail'));
    }
    
    /**
     *@Route("/admin/update/detail/{id}", name="updatedetail")
     */
    public function updateProjetsDetail(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $niouzes = $em->find('AppBundle:ProjetsDetail', $id);
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        $f = $this->createForm(ProjetsDetailype::class, $niouzes);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $f->handleRequest($request);
//            $nomDuFichier = md5(uniqid()).".".$niouzes->getImages()->getClientOriginalExtension();
//            $niouzes->getImages()->move('uploads/img', $nomDuFichier);
//            $niouzes->setImages($nomDuFichier);
            
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($niouzes);
            $em->flush();
            
            return $this->redirect($this->generateUrl('projectsdetail'));
            
        }
}
    
    }
