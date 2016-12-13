<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File;

/**
 * ProjetsPrint
 *
 * @ORM\Table(name="projets_print")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjetsPrintRepository")
 */
class ProjetsPrint
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
     * @ORM\Column(name="Description", type="string", length=512)
     */
    private $description;

    /**
    * @var UploadedFile
     *
     * @ORM\Column(name="Images", type="string", length=255)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="Liens", type="string", length=512)
     */
    private $liens;

    
    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="Image1", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $image1;
    
 
    /**
     * @var string
     *
     * @ORM\Column(name="Technique", type="string", length=512)
     */
    private $technique;
    
     /**
     * @var UploadedFile
     *
     * @ORM\Column(name="Image2", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $image2;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionImg2", type="text")
     */
    private $descriptionImg2;
    
    
    
     /**
     * @var UploadedFile
     *
     * @ORM\Column(name="Image3", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $image3;
    
     /**
     * @var string
     *
     * @ORM\Column(name="DescriptionImg3", type="text")
     */
    private $descriptionImg3;
    
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
     * @return ProjetsPrint
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
     * @return ProjetsPrint
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
     * Set images
     *
     * @param string $images
     *
     * @return ProjetsPrint
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
     * Set liens
     *
     * @param string $liens
     *
     * @return ProjetsPrint
     */
    public function setLiens($liens)
    {
        $this->liens = $liens;

        return $this;
    }

    /**
     * Get liens
     *
     * @return string
     */
    public function getLiens()
    {
        return $this->liens;
    }
    
    
    function getImage1() {
        return $this->image1;
    }

    function getTechnique() {
        return $this->technique;
    }

    function getImage2() {
        return $this->image2;
    }

    function getDescriptionImg2() {
        return $this->descriptionImg2;
    }

    function getImage3() {
        return $this->image3;
    }

    function getDescriptionImg3() {
        return $this->descriptionImg3;
    }

    function setImage1(UploadedFile $image1) {
        $this->image1 = $image1;
    }

    function setTechnique($technique) {
        $this->technique = $technique;
    }

    function setImage2(UploadedFile $image2) {
        $this->image2 = $image2;
    }

    function setDescriptionImg2($descriptionImg2) {
        $this->descriptionImg2 = $descriptionImg2;
    }

    function setImage3(UploadedFile $image3) {
        $this->image3 = $image3;
    }

    function setDescriptionImg3($descriptionImg3) {
        $this->descriptionImg3 = $descriptionImg3;
    }


}

