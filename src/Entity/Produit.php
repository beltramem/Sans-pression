<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="Type_produit", type="integer")
 * @ORM\DiscriminatorMap({"1" = "Biere", "2" = "Alcool", "3"="Vin","4"="Divers","5"="Produit"})
*/
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $ID_produit;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom_produit;

    /**
     * @ORM\Column(type="integer", length=11)
     */
    private $Disponibilite_produit;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_produit;

    /**
     * @ORM\Column(type="text")
     */
    private $Description_produit;
	
	/**
	* @ORM\OneToOne(targetEntity="PhotoProduit", cascade={"persist"})
	* @ORM\JoinColumn(name="ID_photo", referencedColumnName="ID_photo", nullable=false)
	*/
	private $image;


    public function getID_produit()
    {
        return $this->ID_produit;
    }

    public function getNom_produit(): ?string
    {
        return $this->Nom_produit;
    }

    public function setNom_produit(string $Nom_produit): self
    {
        $this->Nom_produit = $Nom_produit;

        return $this;
    }

    public function getDisponibilite_Produit(): ?int
    {
        return $this->Disponibilite_produit;
    }

    public function setDisponibilite_Produit(int $Disponibilite_produit): self
    {
        $this->Disponibilite_produit = $Disponibilite_produit;

        return $this;
    }

    public function getNote_Produit(): ?int
    {
        return $this->Note_produit;
    }

    public function setNote_Produit(int $Note_produit): self
    {
        $this->Note_produit = $Note_produit;

        return $this;
    }

    public function getDescription_Produit(): ?string
    {
        return $this->Description_produit;
    }

    public function setDescription_Produit(string $Description_produit): self
    {
        $this->Description_produit = $Description_produit;

        return $this;
    }
	
	public function setImage(Image $image = null)
	{
		$this->image = $image;
	}

	public function getImage()
	{
		return $this->image;
	}

}
