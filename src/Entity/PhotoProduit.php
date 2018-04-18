<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoProduitRepository")
 */
class PhotoProduit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $ID_photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Url_image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Alt_photo;

    public function getID_photo()
    {
        return $this->ID_photo;
    }

    public function getUrl_Image(): ?string
    {
        return $this->Url_image;
    }

    public function setUrl_Image(string $Url_image): self
    {
        $this->Url_image = $Url_image;

        return $this;
    }

    public function getAlt_Photo(): ?string
    {
        return $this->Alt_photo;
    }

    public function setAlt_Photo(string $Alt_photo): self
    {
        $this->Alt_photo = $Alt_photo;

        return $this;
    }
}
