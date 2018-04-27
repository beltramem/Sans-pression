<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

/**
 *@ORM\MappedSuperclass
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="Type_produit", type="string")
 * @ORM\DiscriminatorMap({"1" = "Produit", "2" = "Alcool", "3"="Vin","4"="Divers", "5"="Biere", "6"="Tireuse"})
*/
abstract class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $IdProduit;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomProduit;

    /**
     * @ORM\Column(type="integer", length=11)
     */
    private $DisponibiliteProduit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NoteProduit;

    /**
     * @ORM\Column(type="text")
     */
    private $DescriptionProduit;
	
	/**
	* @ORM\OneToMany(targetEntity="Commentaire", mappedBy="produit")
	* @ORM\JoinColumn(name="id_commentaire", referencedColumnName="id_commentaire")
	*/
	private $Commentaires;
	
	/**
	* @ORM\Column(type="datetime")
	*/
	private $DateCreationProduit;
	
	 /**
     *  @Assert\File
     */
    private $Photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AltPhoto;
	
	public function __construct()
	{
		$this->commentaires = new ArrayCollection();
	}

    public function getIdProduit()
    {
        return $this->IdProduit;
    }

    public function getNomProduit(): ?string
    {
        return $this->NomProduit;
    }

    public function setNomProduit(string $NomProduit): self
    {
        $this->NomProduit = $NomProduit;

        return $this;
    }
	
    public function getDisponibiliteProduit(): ?int
    {
        return $this->DisponibiliteProduit;
    }

    public function setDisponibiliteProduit(int $DisponibiliteProduit): self
    {
        $this->DisponibiliteProduit = $DisponibiliteProduit;

        return $this;
    }

    public function getNoteProduit(): ?int
    {
        return $this->NoteProduit;
    }

    public function setNoteProduit(int $NoteProduit): self
    {
        $this->NoteProduit = $NoteProduit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->DescriptionProduit;
    }

    public function setDescriptionProduit(string $DescriptionProduit): self
    {
        $this->DescriptionProduit = $DescriptionProduit;

        return $this;
    }
	
	
	public function addCommentaire(Commentaire $commentaire)
	{
	$this->Commentaires[] = $commentaire;

	return $this;
	}

	public function removeCommentaire(Commentaire $commentaire)
	{
	$this->Commentaires->removeElement($commentaire);
	}

	public function getCommentaires()
	{
	return $this->Commentaires;
	}
	
	public function getDateCreationProduit()
	{
	 return $this->DateCreationProduit;
	}

	public function setDateCreationProduit($DateCreationProduit)
	{
	 $this->DateCreationProduit = $DateCreationProduit;
	 return $this;
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

    public function getAltPhoto()
    {
        return $this->AltPhoto;
    }

    public function setAltPhoto(string $AltPhoto)
    {
        $this->AltPhoto = $AltPhoto;

        return $this;
    }

}
