<?php

namespace AppBundle\Controller;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use AppBundle\Entity\Contact;
use AppBundle\Entity\Social;
use AppBundle\Form\ContactType;
use AppBundle\Form\SocialType;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ContactController
 *
 * @author hugues
 */
class ContactController extends Controller {
    
    
     /**
     * @Route("/admin/contact", name="contacts");
     * @Template(":admin:contact.html.twig");
     */
    public function contact(){
        $em = $this->getDoctrine()->getManager();
        $resultsetmapping = new ResultSetMappingBuilder($em);
        $resultsetmapping->addRootEntityFromClassMetadata('AppBundle:Contact', 'contact');
        $query = $em->createNativeQuery("select * from contact", $resultsetmapping);
        $contactinfo = $query->getResult();
        
        $emmmmm = $this->getDoctrine();
        $iconsocial = $emmmmm->getRepository("AppBundle:Social")->findAll();
        
        return array ('contacts' => $contactinfo, 'social' => $iconsocial);
    }
    
    
     /**
     * @Route ("/admin/addcontact",name="formcontact")
     * @Template (":admin:addContact.html.twig")
     * @param Request $request
     */
    public function formContact(Request $request) {
        //on créé un objet vide
        $contact = new Contact();
        //on lie un formulaire avec l'objet créé
        $form= $this->createForm(ContactType::class, $contact);
 
        return array("formContact" => $form->createView());
      
    }
    
    /**
     * @Route ("/admin/valcontact", name="validcontact")
     */
    public function addContact(Request $request) {
       $contactnew = new Contact();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        
        $form = $this->createForm(ContactType::class, $contactnew);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $form->handleRequest($request);
           
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($contactnew);
            $em->flush();
            //J'avoue n'avoir implementer aucun test pour m'assurer de la validité des données en database
            //quoi qu'il en soit après avoir ajouter une news on appele la methode qui va nous afficher la liste des news
            //Bien entendu j'utilise les alias pour le routage ;) 
            //faire un redirect vers getNews();
            return $this->redirectToRoute('contacts');
        }
        //si jamais le post a pas marché je reviens vers l'edition
        //faire un redirect sur ajout de news
        return $this->redirectToRoute('formcontact');
    }
    
     /**
    *@Route("/admin/modifcontact/{id}", name="modifcontact")
    *@Template(":admin:addContact.html.twig")
    */
     public function modifContact($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $contactnew = $em->find('AppBundle:Contact', $id);
         $form = $this->createForm(ContactType::class, $contactnew);
        //on renvoie le formulaire dans la vue
        return array("formContact" => $form->createView(), "id"=>$id);
    }
    
     /**
     *@Route("/admin/delatecontact/{id}", name="delatecontact")
     */
     public function delateContact($id) {
       $em = $this->getDoctrine()->getEntityManager();
        $contactnew = $em->find('AppBundle:Contact', $id);
        $em->remove($contactnew);
        $em->flush();
        return $this->redirect($this->generateUrl('contacts'));
    }
    
     /**
     *@Route("/admin/updatecontact/{id}", name="updatecontact")
     */
    public function updateContact(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $contactnew = $em->find('AppBundle:Contact', $id);
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        $form = $this->createForm(ContactType::class, $contactnew);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $form->handleRequest($request);
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($contactnew);
            $em->flush();
            
            return $this->redirect($this->generateUrl('contacts'));
            
        }
}

     

     /**
     * @Route ("/admin/addsocial",name="formsocial")
     * @Template (":admin:addSocial.html.twig")
     * @param Request $request
     */
    public function formSocial(Request $request) {
        //on créé un objet vide
        $social = new Social();
        //on lie un formulaire avec l'objet créé
        $form= $this->createForm(SocialType::class, $social);
 
        return array("formSocial" => $form->createView());
      
    }

    
     /**
     * @Route ("/admin/valsocial", name="validsocial")
     */
    public function addSocial(Request $request) {
       $socialnew = new Social();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        
        $form = $this->createForm(SocialType::class, $socialnew);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $form->handleRequest($request);
           
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($socialnew);
            $em->flush();
            //J'avoue n'avoir implementer aucun test pour m'assurer de la validité des données en database
            //quoi qu'il en soit après avoir ajouter une news on appele la methode qui va nous afficher la liste des news
            //Bien entendu j'utilise les alias pour le routage ;) 
            //faire un redirect vers getNews();
            return $this->redirectToRoute('contacts');
        }
        //si jamais le post a pas marché je reviens vers l'edition
        //faire un redirect sur ajout de news
        return $this->redirectToRoute('formsocial');
    }
    
     /**
    *@Route("/admin/modifsocial/{id}", name="modifsocial")
    *@Template(":admin:addSocial.html.twig")
    */
     public function modifSocial($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $socialnew = $em->find('AppBundle:Social', $id);
         $form = $this->createForm(SocialType::class, $socialnew);
        //on renvoie le formulaire dans la vue
        return array("formSocial" => $form->createView(), "id"=>$id);
    }
    
     /**
     *@Route("/admin/delatesocial/{id}", name="delatesocial")
     */
     public function delateSocial($id) {
       $em = $this->getDoctrine()->getEntityManager();
        $socialnew = $em->find('AppBundle:Social', $id);
        $em->remove($socialnew);
        $em->flush();
        return $this->redirect($this->generateUrl('contacts'));
    }
    
      /**
     *@Route("/admin/updatesocial/{id}", name="updatesocial")
     */
    public function updateSocial(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $socialnew = $em->find('AppBundle:Social', $id);
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        $form = $this->createForm(SocialType::class, $socialnew);
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        if ($request->getMethod() == 'POST') {
            //on lie le formulaire temporaire avec les valeurs de la requete de type post
            //en gros on se retrouve avec un fork de notre formulaire en local ;) 
            $form->handleRequest($request);
            //Partie persistance des données ou l'on sauvegarde notre news en base de données
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($socialnew);
            $em->flush();
            
            return $this->redirect($this->generateUrl('contacts'));
            
        }
}
}
