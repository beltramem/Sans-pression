<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

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
     *  @Assert\UploadedFile
     */
    private $Photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AltPhoto;

    public function getID_photo()
    {
        return $this->ID_photo;
    }

    public function getPhoto()
    {
        return $this->Photo;
    }

    public function setPhoto($Photo)
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getAltPhoto(): ?string
    {
        return $this->AltPhoto;
    }

    public function setAltPhoto(string $AltPhoto): self
    {
        $this->AltPhoto = $AltPhoto;

        return $this;
    }
}
