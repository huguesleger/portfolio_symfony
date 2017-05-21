<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File;

/**
 * Galerie
 *
 * @ORM\Table(name="galerie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GalerieRepository")
 */
class Galerie
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
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Technique", type="string", length=512)
     */
    private $technique;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="ImageMin", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imageMin;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="ImageDetail", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imageDetail;


    /**
     * @var string
     *
     * @ORM\Column(name="Texte", type="text")
     */
    private $texte;
    
     /**
     * @var UploadedFile
     *
     * @ORM\Column(name="ImageDetail1", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imageDetail1;
    
    
    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="ImageDetail2", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imageDetail2;
    
    
    
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
     * @return Galerie
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
     * Set description
     *
     * @param string $description
     *
     * @return Galerie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set technique
     *
     * @param string $technique
     *
     * @return Galerie
     */
    public function setTechnique($technique)
    {
        $this->technique = $technique;

        return $this;
    }

    /**
     * Get technique
     *
     * @return string
     */
    public function getTechnique()
    {
        return $this->technique;
    }

    /**
     * Set imageMin
     *
     * @param string $imageMin
     *
     * @return Galerie
     */
    public function setImageMin($imageMin)
    {
        $this->imageMin = $imageMin;

        return $this;
    }

    /**
     * Get imageMin
     *
     * @return string
     */
    public function getImageMin()
    {
        return $this->imageMin;
    }

    /**
     * Set imageDetail
     *
     * @param string $imageDetail
     *
     * @return Galerie
     */
    public function setImageDetail($imageDetail)
    {
        $this->imageDetail = $imageDetail;

        return $this;
    }

    /**
     * Get imageDetail
     *
     * @return string
     */
    public function getImageDetail()
    {
        return $this->imageDetail;
    }
    
    
    function getTexte() {
        return $this->texte;
    }

    function getImageDetail1() {
        return $this->imageDetail1;
    }

    function getImageDetail2() {
        return $this->imageDetail2;
    }

    function setTexte($texte) {
        $this->texte = $texte;
    }

    function setImageDetail1($imageDetail1) {
        $this->imageDetail1 = $imageDetail1;
    }

    function setImageDetail2($imageDetail2) {
        $this->imageDetail2 = $imageDetail2;
    }


}

