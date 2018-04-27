<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_note;

    /**
     * @ORM\Column(type="integer")
     */
    private $note_client;
	
	/**
	* @ORM\ManyToOne(targetEntity="Produit")
	* @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit", nullable=false)
	*/
	private $produit;
	
	/**
	* @ORM\ManyToOne(targetEntity="Utilisateur")
	* @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur", nullable=true)
	*/
	private $utilisateur;
	
	public function getUtilisateur()
	{
		return $this->utilisateur;
	}
	public function setUtilisateur(Utilisateur $utilisateur=null)
	{
		$this->utilisateur = $utilisateur;
		
		return $this;
	}
	
	public function getProduit()
	{
		return $this->produit;
	}
	public function setProduit(Produit $produit=null)
	{
		$this->produit = $produit;
		
		return $this;
	}

    public function getId_note()
    {
        return $this->id_note;
    }

    public function getNote_Client(): ?int
    {
        return $this->note_client;
    }

    public function setNote_Client(int $note_client): self
    {
        $this->note_client = $note_client;

        return $this;
    }
}
