<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
	/**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
    */
    private $id_commentaire;

    /**
     * @ORM\Column(type="text")
     */
    private $Contenu_commentaire;
	
	/**
	* @ORM\ManyToOne(targetEntity="Produit", inversedBy="commentaires")
	* @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit", nullable=false)
	*/
	private $produit;	
	
	/**
	* @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="commentaires")
	* @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur", nullable=true)
	*/
	private $utilisateur;
	
	/**
	* @ORM\Column(type="datetime")
	*/
	private $date_commentaire;
	
	
		
    public function getProduit()
    {
        return $this->produit;
    }

    public function setProduit(Produit $produit)
    {
        $this->produit = $produit;

        return $this;
    }    
	public function getContenu_Commentaire(): ?string
    {
        return $this->Contenu_commentaire;
    }

    public function setContenu_Commentaire(string $Contenu_commentaire): self
    {
        $this->Contenu_commentaire = $Contenu_commentaire;

        return $this;
    }

    public function getDate_Commentaire()
    {
        return $this->date_commentaire;
    }

    public function setDate_Commentaire($date_commentaire): self
    {
        $this->date_commentaire = $date_commentaire;

        return $this;
    }
}
