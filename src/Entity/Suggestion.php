<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuggestionRepository")
 */
class Suggestion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_suggestion;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_suggestion;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_fabriquant_suggestion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_suggestion;
	
	/**
	* @ORM\ManyToOne(targetEntity="Utilisateur")
	* @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur", nullable=false)
	*/
	private $utilisateur;
	
	public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur)
    {
        $this->utlisateur = $utilisateur;

        return $this;
    }    

    public function getId_suggestion()
    {
        return $this->id_suggestion;
    }

    public function getNomSuggestion(): ?string
    {
        return $this->nom_suggestion;
    }

    public function setNomSuggestion(string $nom_suggestion): self
    {
        $this->nom_suggestion = $nom_suggestion;

        return $this;
    }

    public function getNomFabriquantSuggestion(): ?string
    {
        return $this->nom_fabriquant_suggestion;
    }

    public function setNomFabriquantSuggestion(string $nom_fabriquant_suggestion): self
    {
        $this->nom_fabriquant_suggestion = $nom_fabriquant_suggestion;

        return $this;
    }

    public function getDateSuggestion(): ?\DateTimeInterface
    {
        return $this->date_suggestion;
    }

    public function setDateSuggestion(\DateTimeInterface $date_suggestion): self
    {
        $this->date_suggestion = $date_suggestion;

        return $this;
    }
}
