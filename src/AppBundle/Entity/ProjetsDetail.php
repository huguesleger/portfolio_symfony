<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjetsDetail
 *
 * @ORM\Table(name="projets_detail")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjetsDetailRepository")
 */
class ProjetsDetail
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
     * @ORM\Column(name="ImgPresentation", type="string", length=512)
     */
    private $imgPresentation;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionSociete", type="text")
     */
    private $descriptionSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="Societe", type="string", length=255)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="Annee", type="string", length=255)
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="Realisations", type="text")
     */
    private $realisations;

    /**
     * @var string
     *
     * @ORM\Column(name="ImgLogo", type="string", length=512)
     */
    private $imgLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="ImgTemplate", type="string", length=512)
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
     * Set imgPresentation
     *
     * @param string $imgPresentation
     *
     * @return ProjetsDetail
     */
    public function setImgPresentation($imgPresentation)
    {
        $this->imgPresentation = $imgPresentation;

        return $this;
    }

    /**
     * Get imgPresentation
     *
     * @return string
     */
    public function getImgPresentation()
    {
        return $this->imgPresentation;
    }

    /**
     * Set descriptionSociete
     *
     * @param string $descriptionSociete
     *
     * @return ProjetsDetail
     */
    public function setDescriptionSociete($descriptionSociete)
    {
        $this->descriptionSociete = $descriptionSociete;

        return $this;
    }

    /**
     * Get descriptionSociete
     *
     * @return string
     */
    public function getDescriptionSociete()
    {
        return $this->descriptionSociete;
    }

    /**
     * Set societe
     *
     * @param string $societe
     *
     * @return ProjetsDetail
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set annee
     *
     * @param string $annee
     *
     * @return ProjetsDetail
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return string
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set realisations
     *
     * @param string $realisations
     *
     * @return ProjetsDetail
     */
    public function setRealisations($realisations)
    {
        $this->realisations = $realisations;

        return $this;
    }

    /**
     * Get realisations
     *
     * @return string
     */
    public function getRealisations()
    {
        return $this->realisations;
    }

    /**
     * Set imgLogo
     *
     * @param string $imgLogo
     *
     * @return ProjetsDetail
     */
    public function setImgLogo($imgLogo)
    {
        $this->imgLogo = $imgLogo;

        return $this;
    }

    /**
     * Get imgLogo
     *
     * @return string
     */
    public function getImgLogo()
    {
        return $this->imgLogo;
    }

    /**
     * Set imgTemplate
     *
     * @param string $imgTemplate
     *
     * @return ProjetsDetail
     */
    public function setImgTemplate($imgTemplate)
    {
        $this->imgTemplate = $imgTemplate;

        return $this;
    }

    /**
     * Get imgTemplate
     *
     * @return string
     */
    public function getImgTemplate()
    {
        return $this->imgTemplate;
    }

    /**
     * Set descriptionTemplate
     *
     * @param string $descriptionTemplate
     *
     * @return ProjetsDetail
     */
    public function setDescriptionTemplate($descriptionTemplate)
    {
        $this->descriptionTemplate = $descriptionTemplate;

        return $this;
    }

    /**
     * Get descriptionTemplate
     *
     * @return string
     */
    public function getDescriptionTemplate()
    {
        return $this->descriptionTemplate;
    }

    /**
     * Set lienSite
     *
     * @param string $lienSite
     *
     * @return ProjetsDetail
     */
    public function setLienSite($lienSite)
    {
        $this->lienSite = $lienSite;

        return $this;
    }

    /**
     * Get lienSite
     *
     * @return string
     */
    public function getLienSite()
    {
        return $this->lienSite;
    }
   
    public function __toString() {
        return $this->getSociete();
    }
}

