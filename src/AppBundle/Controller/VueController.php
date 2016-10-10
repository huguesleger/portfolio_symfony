<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Doctrine\ORM\Query\ResultSetMappingBuilder;
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
     * @Route("/");
     * @Template(":site:index.html.twig");
     */
    public function Index(){
        
    }
    
    /**
     * @Route("/projets", name="travauxweb");
     * @Template(":site:projets.html.twig");
     */
    public function Projets(){
       
        return array ('projects' => $this->getDoctrine()->getRepository('AppBundle:Projets')->findAll());
    }
    
    /**
     * @Route("/onepale",name="connexion");
     * @Template(":site:connexion.html.twig");
     */
    public function Connexion(){
        
    }
}
