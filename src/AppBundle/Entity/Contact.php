<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="EmailSite", type="string", length=255)
     */
    private $emailSite;

    /**
     * @var string
     *
     * @ORM\Column(name="EmailPro", type="string", length=255)
     */
    private $emailPro;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePostal", type="string", length=255)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="LienSite", type="string", length=255)
     */
    private $lienSite;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="LienPro", type="string", length=255)
     */
    private $lienPro;
    
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
     * Set emailSite
     *
     * @param string $emailSite
     *
     * @return Contact
     */
    public function setEmailSite($emailSite)
    {
        $this->emailSite = $emailSite;

        return $this;
    }

    /**
     * Get emailSite
     *
     * @return string
     */
    public function getEmailSite()
    {
        return $this->emailSite;
    }

    /**
     * Set emailPro
     *
     * @param string $emailPro
     *
     * @return Contact
     */
    public function setEmailPro($emailPro)
    {
        $this->emailPro = $emailPro;

        return $this;
    }

    /**
     * Get emailPro
     *
     * @return string
     */
    public function getEmailPro()
    {
        return $this->emailPro;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Contact
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Contact
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }
    
    function getLienSite() {
        return $this->lienSite;
    }

    function getLienPro() {
        return $this->lienPro;
    }

    function setLienSite($lienSite) {
        $this->lienSite = $lienSite;
    }

    function setLienPro($lienPro) {
        $this->lienPro = $lienPro;
    }




    
}

