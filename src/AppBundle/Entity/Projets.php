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
     * @ORM\Column(name="Images", type="string", length=512)
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
     * @var string
     *
     * @ORM\Column(name="Liens", type="string", length=255)
     */
    private $liens;

    
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="ProjetsDetail")
     * @ORM\JoinColumn(name="fk_projetsDetail", referencedColumnName="id")
     */
    private $projetsDetail;
   
    
    

        
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
     * Set liens
     *
     * @param string $liens
     *
     * @return Projets
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
    
    function getProjetsDetail() {
        return $this->projetsDetail;
    }

    function setProjetsDetail($projetsDetail) {
        $this->projetsDetail = $projetsDetail;
    }

    public function __toString() {
        return $this->getTitre();
    }


}
