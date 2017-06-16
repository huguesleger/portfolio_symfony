<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Galerie;
use AppBundle\Entity\Projets;
use AppBundle\Entity\ProjetsPrint;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;




/**
 * Description of VueController
 *
 * @author hugues
 */
class VueController extends Controller {
    //put your code here
    /**
     * @Route("/", name="home");
     * @Template(":site:index.html.twig");
     */
    public function Index(){
         return array ('projectscaroussel' => $this->getDoctrine()->getRepository('AppBundle:ImagesCaroussel')->findByPublier(1));
        
    }
    
    /**
     * @Route("/web", name="travauxweb");
     * @Template(":site:projets.html.twig");
     */
    public function Projets(){
      
        return array ('projects' => $this->getDoctrine()->getRepository('AppBundle:Projets')->findBy(array('publier' => '1'),
                
        //filtrage par post du plus recent
        array('annee'=>'DESC'))
            );

        
      
        
    }
    
     /**
     * @Route("/webdesign-graphisme", name="travauxprint");
     * @Template(":site:print.html.twig");
     */
    public function ProjetsPrint(){
        return array (
            'projectsprint' => $this->getDoctrine()->getRepository('AppBundle:ProjetsPrint')->findBy(array('publier' => '1'),array('annee'=>'DESC')));
        
    }

     /**
     * @Route("/galerie", name="travauxgalerie");
     * @Template(":site:galerie.html.twig");
     */
    public function Galerie(){
       
        return array ('projectsgal' => $this->getDoctrine()->getRepository('AppBundle:Galerie')->findByPublier(1));
        
    }
    
     /**
     * @Route("/a-propos", name="apropos");
     * @Template(":site:aPropos.html.twig");
     */
    public function infosMe(){
       
        return array (
            'textes' => $this->getDoctrine()->getRepository('AppBundle:Apropos')->findAll(),
            'formation' =>$this->getDoctrine()->getRepository('AppBundle:Formation')->findAll(), array('annee'=>'DESC')
                );
        
    }

    
    
    
     /**
     * @Route("/web/{id}", name="detailprojets")
     * @Template(":site:projetsDetail.html.twig");
     */
    public function ProjetsDetail(Projets $id){
        
        $em = $this->getDoctrine()->getManager();
        $locationRepo = $em->getRepository('AppBundle:Projets');
        $nb = $locationRepo->getNb();
        
        
        
        return array ('projects' => $this->getDoctrine()->getRepository('AppBundle:Projets')->findById($id),
                      'nb' => $nb,

                );
        
    }
    
    /**
     * @Route("/webdesign-graphisme/{id}", name="detailprint")
     * @Template(":site:projetsPrintDetail.html.twig");
     */
    public function ProjetsDetailPrint(ProjetsPrint $id){
        $em = $this->getDoctrine()->getManager();
        $locationRepo = $em->getRepository('AppBundle:ProjetsPrint');
        $nb2 = $locationRepo->getNb2();

        return array ('projectsprint' => $this->getDoctrine()->getRepository('AppBundle:ProjetsPrint')->findById($id),
            'nb2' => $nb2,
            );
        
    }
    
    
    
     /**
     * @Route("/galerie/{id}", name="detailgalerie")
     * @Template(":site:galerieDetail.html.twig");
     */
    public function DetailGalerie(Galerie $id){
        $em = $this->getDoctrine()->getManager();
        $locationRepo = $em->getRepository('AppBundle:Galerie');
        $nb3 = $locationRepo->getNb3();
        
        return array ('projectsgal' => $this->getDoctrine()->getRepository('AppBundle:Galerie')->findById($id),
            'nb3' => $nb3,
                );
        
    }

    
    /**
     * @Route("/onepale",name="connexion");
     * @Template(":site:connexion.html.twig");
     */
    public function Connexion(){
  }
    
  
//   /**
//     * @Route("/contact",name="contact");
//     * @Template(":site:contact.html.twig");
//     */
//  public function ActionContact(){
////       $message = Swift_Message :: newInstance ()
////        -> setSubject ( 'Hello Email' )
////        -> setFrom ( 'hugueslegerdevweb@gmai.com' )
////        -> setTo ('contact@hl-developerz.com')
////        -> setBody ('body2');
////      
////      $this -> get ( 'mailer' ) -> send ( $message );
//      
//      
//       
//}

/////////Formulaire Contact
    /**
     * @Route("/contact",name="contact")
     * @Template(":site:contact.html.twig")
     */
  public function contactAction(Request $request)
{
      
              
        
      if ($request->getMethod()=='POST')
      {
        
          
          $nom = $request->get('nom');
          $email = $request->get('email');
          $message = $request->get('message');
          
          

       
          
    $contact = Swift_Message::newInstance();
        $contact->toString();
        $contact->setSubject($nom);
        $contact->setFrom($email);
        $contact->setTo('contactme@hl-developerz.com');
        $contact->setReplyTo($email);
        $contact->setBody($message);
                    
    $this->get('mailer')->send($contact);
    
        
    $this->addFlash(
            'succesmail',
            'Email envoyé avec succés'
        );
    
        
}

 return $this->render(':site:contact.html.twig',

                array(

                    'contacts' => $this->getDoctrine()->getRepository('AppBundle:Contact')->findAll(),
                    'social'=> $this->getDoctrine()->getRepository('AppBundle:Social')->findAll()

                ));

        
}

    
}


