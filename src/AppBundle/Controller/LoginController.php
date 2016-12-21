<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;




/**
 * Description of LoginController
 *
 * @author hugues
 */
class LoginController extends Controller {
    
      /**
     * @Route("/loginCheck",name="loginCheck")
     * @throws Exception
     */
    public function check() {
        throw new Exception('Verifiez votre fichier security');
        
    }
    /**
     * idem déconnexion
     * @Route("/loginOut",name="loginOut")
     * @throws Exception
     */
    public function logout() {
        throw new Exception('Verifiez votre fichier security');
    }
    
    
    
    /////  Ajouter Admin 
    /**
     * @Route("/add/admin",name="addadmin")
     * @throws Exception
     */
    public function addAdmin() {
       $u = new User();
        $u->setName("admin");
        $u->setPass("admin1");
       $factory = $this->get('security.encoder_factory');

$encoder = $factory->getEncoder($u);
$password = $encoder->encodePassword($u->getPass(), $u->getSalt());
$u->setPass($password);
        $u->setRoles(array("ROLE_ADMIN"));
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($u);
        $em->flush();
        
        return $this->redirectToRoute("home");
        
        
    }
    
    
    ////// Modification 1) Info Vue formulaire 
    /**
     * @Route("admin/info/{id}",name="editUser")
     * @Template(":admin:infoProfil.html.twig")
     */
    function editInfo($id) {
          $em = $this->getDoctrine()->getEntityManager();
          $uzer = $em->find('AppBundle:User',$id);
          $f= $this->createForm(UserType::class, $uzer);
          
        
          return array("formUser"=> $f->createView(), "id"=>$id);
    }
   
    ////// Modification 2) Info FormPersist
    /**
    * @Route("/admin/info/update/{id}",name="modifUser")
    * 
    */
   public function  updateEvent(Request $request, $id){
       $em = $this->getDoctrine()->getEntityManager(); 
       $uzer = $em->find('AppBundle:User',$id);
       $f= $this->createForm(UserType::class, $uzer);
       
       if ($request->getMethod() == 'POST'){
           
       $f->handleRequest($request);
        $factory = $this->get('security.encoder_factory');

$encoder = $factory->getEncoder($uzer);
$password = $encoder->encodePassword($uzer->getPass(), $uzer->getSalt());
$uzer->setPass($password);
       
     $uzer->setRoles(array("ROLE_ADMIN")); 
     
       $em -> merge($uzer);
       $em->flush();
       
       return $this->redirect($this->generateUrl('admin'));
        }
       
       }
       
      
    
    
}
