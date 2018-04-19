<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 */
class Favorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_favorie;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_favorie;
	
	/**
	* @ORM\OneToOne(targetEntity="Produit")
	* @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit", nullable=false)
	*/
	private $produit;	
	
	/**
	* @ORM\ManyToOne(targetEntity="Utilisateur")
	* @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur", nullable=false)
	*/
	private $utilisateur;
	
	
	
	public function getProduit()
	{
		return $this->produit;
	}
	public function setProduit(Produit $produit=null)
	{
		$this->produit = $produit;
		
		return $this;
	}

    public function getId_favorie()
    {
        return $this->id_favorie;
    }

    public function getDate_favorie(): ?int
    {
        return $this->date_favorie;
    }

    public function setDate_favorie($date_favorie): self
    {
        $this->date_favorie = $date_favorie;

        return $this;
    }
}

