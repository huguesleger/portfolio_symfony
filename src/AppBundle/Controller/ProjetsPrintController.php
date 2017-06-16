<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\ProjetsPrint;
use AppBundle\Form\ProjetsPrintType;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ProjetsPrintController
 *
 * @author hugues
 */
class ProjetsPrintController extends Controller{
   
     /**
     * @Route("/admin/print", name="projectsprint");
     * @Template(":admin:print.html.twig");
     */
    public function getProjetsPrint(){
        $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle:ProjetsPrint', 'projetsprint');
        $query = $em->createNativeQuery("select * from projets_print ORDER BY annee DESC", $rsm);
        $projectprint = $query->getResult();
        return array ('projectsprint' => $projectprint

 
            );
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
            
            
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImage1()->getClientOriginalExtension();
            $niouzes->getImage1()->move('uploads/img', $nomDuFichier);
            $niouzes->setImage1($nomDuFichier);
            
             
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImage2()->getClientOriginalExtension();
            $niouzes->getImage2()->move('uploads/img', $nomDuFichier);
            $niouzes->setImage2($nomDuFichier);
            
            $nomDuFichier = md5(uniqid()).".".$niouzes->getImage3()->getClientOriginalExtension();
            $niouzes->getImage3()->move('uploads/img', $nomDuFichier);
            $niouzes->setImage3($nomDuFichier);
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
        //images deja uploader
        $image = $niouzes->getImages();
        $image1 = $niouzes->getImage1();
        $image2 = $niouzes->getImage2();
        $image3 = $niouzes->getImage3();
       
        $f =$this->createForm(ProjetsPrintType::class, $niouzes);
        
       
        if ($request->getMethod() == 'POST') {
          
            $imagesNew = $em->find('AppBundle:ProjetsPrint', $id);
            $f = $this->createForm(ProjetsPrintType::class, $imagesNew);
            $f->handleRequest($request);
          
            
            if ($imagesNew->getImages() == null) { //on change pas d'images
                $imagesNew->setImages($image); //On garde celle déja uploader
            }else{ //sinon on upload a nouveau
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImages()->getClientOriginalExtension();
                $imagesNew->getImages()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImages($nomDuFichier);
            }
            
            if ($imagesNew->getImage1() == null) { 
                $imagesNew->setImage1($image1); 
            }else{ 
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImage1()->getClientOriginalExtension();
                $imagesNew->getImage1()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImage1($nomDuFichier);
            }
            
            if ($imagesNew->getImage2() == null) { 
                $imagesNew->setImage2($image2); 
            }else{ 
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImage2()->getClientOriginalExtension();
                $imagesNew->getImage2()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImage2($nomDuFichier);
            }
            
            if ($imagesNew->getImage3() == null) { 
                $imagesNew->setImage3($image3); 
            }else{ 
                 $nomDuFichier = md5(uniqid()) . '.' . $imagesNew->getImage3()->getClientOriginalExtension();
                $imagesNew->getImage3()->move('uploads/img', $nomDuFichier);
                $imagesNew->setImage3($nomDuFichier);
            }
            
     
            $em = $this->getDoctrine()->getEntityManager();
            $em->merge($imagesNew);
            $em->flush();
            
            return $this->redirect($this->generateUrl('projectsprint'));
            
        }
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
     * @Route("/admin/projets/print/detail/{id}", name="detailprojetsprint");
     * @Template(":admin:projetsDetailPrint.html.twig");
     */
    public function afficheProjetsPrint($id){
        return array ('projectsprint' => $this->getDoctrine()->getRepository('AppBundle:ProjetsPrint')->findById($id));
    }

}
