<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @Route("/projets", name="travauxweb");
     * @Template(":site:projets.html.twig");
     */
    public function Projets(){
       
        return array ('projects' => $this->getDoctrine()->getRepository('AppBundle:Projets')->findByPublier(1));
    }
    
     /**
     * @Route("/print", name="travauxprint");
     * @Template(":site:print.html.twig");
     */
    public function ProjetsPrint(){
       
        return array ('projectsprint' => $this->getDoctrine()->getRepository('AppBundle:ProjetsPrint')->findByPublier(1));
        
    }

     /**
     * @Route("/projets/detail/{id}", name="detailprojets")
     * @Template(":site:projetsDetail.html.twig");
     */
    public function ProjetsDetail($id){
        return array ('projects' => $this->getDoctrine()->getRepository('AppBundle:Projets')->findById($id));
        
    }

    
    /**
     * @Route("/onepale",name="connexion");
     * @Template(":site:connexion.html.twig");
     */
    public function Connexion(){

  }
    
}
