<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Projets;
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
    public function updateNews(Request $request, $id) {
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
}
