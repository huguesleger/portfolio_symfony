<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ajouter
 *
 * @ORM\Table(name="ajouter")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AjouterRepository")
 */
class Ajouter
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
     * @ORM\Column(name="Ajouter_img", type="string", length=255)
     */
    private $ajouterImg;

    /**
     * @var string
     *
     * @ORM\Column(name="Ajouter_description", type="text")
     */
    private $ajouterDescription;


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
     * Set ajouterImg
     *
     * @param string $ajouterImg
     *
     * @return Ajouter
     */
    public function setAjouterImg($ajouterImg)
    {
        $this->ajouterImg = $ajouterImg;

        return $this;
    }

    /**
     * Get ajouterImg
     *
     * @return string
     */
    public function getAjouterImg()
    {
        return $this->ajouterImg;
    }

    /**
     * Set ajouterDescription
     *
     * @param string $ajouterDescription
     *
     * @return Ajouter
     */
    public function setAjouterDescription($ajouterDescription)
    {
        $this->ajouterDescription = $ajouterDescription;

        return $this;
    }

    /**
     * Get ajouterDescription
     *
     * @return string
     */
    public function getAjouterDescription()
    {
        return $this->ajouterDescription;
    }
}

