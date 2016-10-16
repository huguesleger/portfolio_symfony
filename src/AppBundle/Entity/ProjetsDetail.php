<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File;

/**
 * ProjetsDetail
 *
 * @ORM\Table(name="projets_detail")
 * @ORM\Entity(repositoryClass="ProjetsDetailRepository")
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
     * @var UploadedFile
     *
     * @ORM\Column(name="Img_Presentation", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imgPresentation;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_Societe", type="text")
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
     * @ORM\Column(name="Realisation", type="string", length=512)
     */
    private $realisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Annee_Realisation", type="string", length=255)
     */
    private $anneeRealisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_realisation", type="text")
     */
    private $descriptionRealisation;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="Img_Logo", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imgLogo;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="Img_Template", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $imgTemplate;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_Template", type="text")
     */
    private $descriptionTemplate;


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
     * Set realisation
     *
     * @param string $realisation
     *
     * @return ProjetsDetail
     */
    public function setRealisation($realisation)
    {
        $this->realisation = $realisation;

        return $this;
    }

    /**
     * Get realisation
     *
     * @return string
     */
    public function getRealisation()
    {
        return $this->realisation;
    }

    /**
     * Set a
     *
     * @param string $anneeRealisation
     *
     * @return ProjetsDetail
     */
    public function setAnneeRealisation($anneeRealisation)
    {
        $this->anneeRealisation = $anneeRealisation;

        return $this;
    }

    /**
     * Get anneeRealisation
     *
     * @return string
     */
    public function getAnneeRealisation()
    {
        return $this->anneeRealisation;
    }

    /**
     * Set descriptionRealisation
     *
     * @param string $descriptionRealisation
     *
     * @return ProjetsDetail
     */
    public function setDescriptionRealisation($descriptionRealisation)
    {
        $this->descriptionRealisation = $descriptionRealisation;

        return $this;
    }

    /**
     * Get descriptionRealisation
     *
     * @return string
     */
    public function getDescriptionRealisation()
    {
        return $this->descriptionRealisation;
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
}

