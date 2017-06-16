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
 * Description of ListesController
 *
 * @author hugues
 */
class ListesController extends Controller {
    
   /**
     * @Route("/admin/liste/projets/web", name="listeweb");
     * @Template(":admin:listeWeb.html.twig");
     */
    public function listeProjets(){
         $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:Projets', 'projets');
        $query = $em->createNativeQuery("select * from projets ORDER BY annee DESC", $rsm);
        $project = $query->getResult();
        return array ('projects' => $project); 
    }
    
     /**
     * @Route("/admin/liste/projets/print", name="listeprint");
     * @Template(":admin:listePrint.html.twig");
     */
    public function listeProjetsPrint(){
         $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:ProjetsPrint', 'projetsprint');
        $query = $em->createNativeQuery("select * from projets_print", $rsm);
        $project = $query->getResult();
        return array ('projectsprint' => $project); 
    }
   
    /**
     * @Route("/admin/liste/galerie", name="listegal");
     * @Template(":admin:listeGalerie.html.twig");
     */
    public function listeGalerie(){
         $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:Galerie', 'projetsgal');
        $query = $em->createNativeQuery("select * from galerie", $rsm);
        $galerie = $query->getResult();
        return array ('projectsgal' => $galerie); 
    }  
}
