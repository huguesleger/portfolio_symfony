<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Apropos;
use AppBundle\Entity\Formation;
use AppBundle\Form\AproposType;
use AppBundle\Form\FormationType;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of TexteController
 *
 * @author hugues
 */
class TexteController extends Controller{
    
    
    /**
     * @Route("admin/texte", name="textes")
     * @Template(":admin:textes.html.twig")
     */
    public function text(){
        
        $em = $this->getDoctrine()->getManager();
        $resultsetmapping = new ResultSetMappingBuilder($em);
        $resultsetmapping->addRootEntityFromClassMetadata('AppBundle:Apropos', 'propos');
        $query = $em->createNativeQuery("select * from apropos", $resultsetmapping);
        $affichepropos = $query->getResult();
        
        $emmmmm = $this->getDoctrine();
        $formation = $emmmmm->getRepository("AppBundle:Formation")->findAll();
        
         return array ('textes' => $affichepropos, 'formation' => $formation);
        
    }
 
    
    /**
     * @Route("admin/addpropos", name="addpropos")
     * @Template(":admin:addPropos.html.twig")
     */
    
    public function addPropos(){
        
       $propos = new Apropos();
       
       $form = $this->createForm(AproposType::class, $propos);
       
       return array("formPropos" => $form->createView());
       
    }
    
    
    /**
     * @Route("admin/validpropos", name="validpropos")
     */
    public function valPropos(Request $request){
        
        $proposvalid = new Apropos();
        
        $form = $this->createForm(AproposType::class, $proposvalid);
        
          if ($request->getMethod() == 'POST') {
         
            $form->handleRequest($request);
           
        
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($proposvalid);
            $em->flush();
         
            return $this->redirectToRoute('textes');
        }
       
        return $this->redirectToRoute('addpropos');
    }
        
     
     /**
    *@Route("/admin/modifpropos/{id}", name="modifpropos")
    *@Template(":admin:addPropos.html.twig")
    */
     public function modifPropos($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $proposmodif = $em->find('AppBundle:Apropos', $id);
         $form = $this->createForm(AproposType::class, $proposmodif);
        //on renvoie le formulaire dans la vue
        return array("formPropos" => $form->createView(), "id"=>$id);
    }
    
    
     /**
     *@Route("/admin/delatepropos/{id}", name="delatepropos")
     */
     public function delatePropos($id) {
       $em = $this->getDoctrine()->getEntityManager();
        $proposdelate = $em->find('AppBundle:Apropos', $id);
        $em->remove($proposdelate);
        $em->flush();
        return $this->redirect($this->generateUrl('textes'));
    }
    
       /**
     *@Route("/admin/updatepropos/{id}", name="updatepropos")
     */
    public function updatePropos(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $proposupdate = $em->find('AppBundle:Apropos', $id);
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        $form = $this->createForm(AproposType::class, $proposupdate);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $form->handleRequest($request);
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($proposupdate);
            $em->flush();
            
            return $this->redirect($this->generateUrl('textes'));
            
        }
    
    }
    
    
    
     /**
     * @Route ("/admin/addformation",name="formformation")
     * @Template (":admin:addFormation.html.twig")
     */
    public function formFormation() {
        //on créé un objet vide
        $formation = new Formation();
        //on lie un formulaire avec l'objet créé
        $form= $this->createForm(FormationType::class, $formation);
 
        return array("formFormation" => $form->createView());
      
    }
    
       /**
     * @Route ("/admin/valformation", name="validformation")
     */
    public function addFormation(Request $request) {
       $formationnew = new Formation();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        
        $form = $this->createForm(FormationType::class, $formationnew);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $form->handleRequest($request);
           
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($formationnew);
            $em->flush();
            //J'avoue n'avoir implementer aucun test pour m'assurer de la validité des données en database
            //quoi qu'il en soit après avoir ajouter une news on appele la methode qui va nous afficher la liste des news
            //Bien entendu j'utilise les alias pour le routage ;) 
            //faire un redirect vers getNews();
            return $this->redirectToRoute('textes');
        }
        //si jamais le post a pas marché je reviens vers l'edition
        //faire un redirect sur ajout de news
        return $this->redirectToRoute('formformation');
    }
    
    
      /**
    *@Route("/admin/modifformation/{id}", name="modifformation")
    *@Template(":admin:addFormation.html.twig")
    */
     public function modifFormation($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $formationnew = $em->find('AppBundle:Formation', $id);
         $form = $this->createForm(FormationType::class, $formationnew);
        //on renvoie le formulaire dans la vue
        return array("formFormation" => $form->createView(), "id"=>$id);
    }
    
    
     /**
     *@Route("/admin/delateformation/{id}", name="delateformation")
     */
     public function delateFormation($id) {
       $em = $this->getDoctrine()->getEntityManager();
        $formationnew = $em->find('AppBundle:Formation', $id);
        $em->remove($formationnew);
        $em->flush();
        return $this->redirect($this->generateUrl('textes'));
    }
    
          /**
     *@Route("/admin/updateformation/{id}", name="updateformation")
     */
    public function updateFormation(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $formationnew = $em->find('AppBundle:Formation', $id);
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        $form = $this->createForm(FormationType::class, $formationnew);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $form->handleRequest($request);
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($formationnew);
            $em->flush();
            
            return $this->redirect($this->generateUrl('textes'));
            
        }
}
    
    
}
