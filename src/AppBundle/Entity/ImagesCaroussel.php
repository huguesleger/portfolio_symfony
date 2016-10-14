<?php

namespace AppBundle\Entity;

use AppBundle\Repository\ImagesCarousselRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File;

/**
 * ImagesCaroussel
 *
 * @ORM\Table(name="images_caroussel")
 * @ORM\Entity(repositoryClass="ImagesCarousselRepository")
 */
class ImagesCaroussel
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
     * @ORM\Column(name="Images", type="string", length=512)
     * @File(mimeTypes={"image/jpeg"})
     */
    private $images;



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
     * Set images
     *
     * @param string $images
     *
     * @return ImagesCaroussel
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
}

