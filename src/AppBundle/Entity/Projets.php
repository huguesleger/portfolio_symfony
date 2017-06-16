<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File;

/**
 * Projets
 *
 * @ORM\Table(name="projets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjetsRepository")
 */
class Projets
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="Images", type="string", length=512, nullable=true)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $images;

   

           

    
        /**
     * @var string
     *
     * @ORM\Column(name="Descriptif", type="string", length=512)
     */
    private $descriptif;

    
    

    
    

        
    /**
     * @var bool
     * @ORM\Column(name="Publier", type="boolean") 
     */
    private $publier;
    function getPublier() {
        return $this->publier;
    }

    
    
    function setPublier($publier) {
        $this->publier = $publier;
    }
    
    

    
    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="ImgPresentation", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imgPresentation;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionSociete", type="text")
     */
    private $descriptionSociete;

 

    /**
     * @var DateTime
     *
     * @ORM\Column(name="Annee", type="date")
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="Realisations", type="text")
     */
    private $realisations;

    /**
     * @var UploadedFile
 
     * @ORM\Column(name="ImgLogo", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imgLogo;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="ImgTemplate", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"}) 
     */
    private $imgTemplate;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionTemplate", type="text")
     */
    private $descriptionTemplate;

    /**
     * @var string
     *
     * @ORM\Column(name="LienSite", type="string", length=512)
     */
    private $lienSite;


    
        
        /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Projets
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set images
     *
     * @param string $images
     *
     * @return Projets
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set descriptif
     *
     * @param string $descriptif
     *
     * @return Projets
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * Get descriptif
     *
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    
  
    
  
 /**
     * Get imgPresentation
     *
     * @return string
     */
    function getImgPresentation() {
        return $this->imgPresentation;
    }

     /**
     * Get descriptionSociete
     *
     * @return string
     */
    function getDescriptionSociete() {
        return $this->descriptionSociete;
    }

  
     /**
     * Get annee
     *
     * @return string
     */
    function getAnnee() {
        return $this->annee;
    }

    /**
     * Get realisations
     *
     * @return string
     */
    function getRealisations() {
        return $this->realisations;
    }

    /**
     * Get imgLogo
     *
     * @return string
     */
    function getImgLogo() {
        return $this->imgLogo;
    }

     /**
     * Get imgTemplate
     *
     * @return string
     */
    function getImgTemplate() {
        return $this->imgTemplate;
    }

    /**
     * Get descriptionTemplate
     *
     * @return string
     */
    function getDescriptionTemplate() {
        return $this->descriptionTemplate;
    }

     /**
     * Get lienSite
     *
     * @return string
     */
    function getLienSite() {
        return $this->lienSite;
    }

     /**
     * Set imgPresentation
     *
     * @param string $imgPresentation
     *
     * @return Projets
     */
    function setImgPresentation($imgPresentation) {
        $this->imgPresentation = $imgPresentation;
    }

    /**
     * Set descriptionSociete
     *
     * @param string $descriptionSociete
     *
     * @return Projets
     */
    function setDescriptionSociete($descriptionSociete) {
        $this->descriptionSociete = $descriptionSociete;
    }


      /**
     * Set annee
     *
     * @param string $annee
     *
     * @return Projets
     */
    function setAnnee($annee) {
        $this->annee = $annee;
    }

     /**
     * Set realisations
     *
     * @param string $realisations
     *
     * @return Projets
     */
    function setRealisations($realisations) {
        $this->realisations = $realisations;
    }

     /**
     * Set imgLogo
     *
     * @param string $imgLogo
     *
     * @return Projets
     */
    function setImgLogo($imgLogo) {
        $this->imgLogo = $imgLogo;
    }

     /**
     * Set imgTemplate
     *
     * @param string $imgTemplate
     *
     * @return Projets
     */
    function setImgTemplate($imgTemplate) {
        $this->imgTemplate = $imgTemplate;
    }

    /**
     * Set descriptionTemplate
     *
     * @param string $descriptionTemplate
     *
     * @return Projets
     */
    function setDescriptionTemplate($descriptionTemplate) {
        $this->descriptionTemplate = $descriptionTemplate;
    }

     /**
     * Set lienSite
     *
     * @param string $lienSite
     *
     * @return Projets
     */
    function setLienSite($lienSite) {
        $this->lienSite = $lienSite;
    }


}
