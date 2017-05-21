<?php

namespace AppBundle\Controller;
//use AppBundle\Entity\ProjetsDetail;

//use AppBundle\Form\ProjetsDetailType;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
//use Symfony\Component\Validator\Constraints\File;

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
    public function homeAdmin(Request $request){
       $session=$request->getSession();
       if($request->attributes->has(Security::AUTHENTICATION_ERROR)){
           $error = $request->attributes->get(Security::AUTHENTICATION_ERROR);
       }else{
           $error = $session->get(Security::AUTHENTICATION_ERROR);
           $session->remove(Security::AUTHENTICATION_ERROR);
       }
     
        $em = $this->getDoctrine()->getManager();
        $locationRepo = $em->getRepository('AppBundle:Projets');
        $nb = $locationRepo->getNb();

        $entitymanager = $this->getDoctrine()->getManager();
        $event = $entitymanager->getRepository("AppBundle:ProjetsPrint");
        $nb2 = $event->getNb2();
        
        $entitymanagernb = $this->getDoctrine()->getManager();
        $nbgal = $entitymanagernb->getRepository("AppBundle:Galerie");
        $nb3 = $nbgal->getNb3();
        
        $emm = $this->getDoctrine();
        $web = $emm->getRepository("AppBundle:Projets")->findBy(array('publier' => '1'),
        //filtrage par date croissant
        array('annee'=>'DESC'), 1);
        
        $emmm = $this->getDoctrine();
        $print = $emmm->getRepository("AppBundle:ProjetsPrint")->findBy(array('publier' => '1'),  array('id'=>'DESC'), 1);
        
        $emmmm = $this->getDoctrine();
        $galerie = $emmmm->getRepository("AppBundle:Galerie")->findBy(array('publier' => '1'),  array('id'=>'DESC'), 1);
        
        $emmmmm = $this->getDoctrine();
        $header = $emmmmm->getRepository("AppBundle:ImagesCaroussel")->findById(array('id', '1'));
        
       return array ('nb' => $nb,
                    'nb2' => $nb2,
                    'nb3' => $nb3,
                    'projects' => $web,
                    'projectsprint' => $print,
                    'projectsgal' => $galerie,
                    'projectscaroussel' => $header,
//                    "last_username" => $session->get(Security::LAST_USERNAME)
           ); 
    }
    
}

//     /**
//     * @Route("/admin/supprimercaroussel/{id}", name="suppcaroussel")
//     */
//     public function supprimerSiteCaroussel($id){
//        $em = $this->getDoctrine()->getEntityManager();
//        $niouzes = $em->find('AppBundle:ImagesCaroussel', $id);
//        $this->createForm(ImagesCarousselType::class, $niouzes);
//        
//        $niouzes->setPublier(0);
//          
//         $em->merge($niouzes);
//         $em->flush();
//         
//         return $this->redirectToRoute('projectscaroussel');
//     }
     
//     /**
//     * @Route("/admin/supprimerweb/{id}", name="suppweb")
//     */
//     public function supprimerSiteWeb($id){
//        $em = $this->getDoctrine()->getEntityManager();
//        $niouzes = $em->find('AppBundle:Projets', $id);
//        $this->createForm(ProjetsType::class, $niouzes);
//        
//        $niouzes->setPublier(0);
//          
//         $em->merge($niouzes);
//         $em->flush();
//         
//         return $this->redirectToRoute('projects');
//     }
     
//     /**
//     * @Route("/admin/supprimerprint/{id}", name="suppprint")
//     */
//     public function supprimerSitePrint($id){
//        $em = $this->getDoctrine()->getEntityManager();
//        $niouzes = $em->find('AppBundle:ProjetsPrint', $id);
//        $this->createForm(ProjetsPrintType::class, $niouzes);
//        