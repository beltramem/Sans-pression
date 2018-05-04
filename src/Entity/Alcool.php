<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlcoolRepository")
 */
class Alcool extends Produit
{

	/**
	* @ORM\ManyToOne(targetEntity="TypeAlcool")
	* @ORM\JoinColumn(name="id_type_alcool", referencedColumnName="id_type_alcool", nullable=false)
	*/
    private $TypeAlcool;
	
	/**
	* @ORM\ManyToOne(targetEntity="CategorieVieillissement")
	* @ORM\JoinColumn(name="id_categorie_vieillissement", referencedColumnName="id_categorie_vieillissement", nullable=true)
	*/
    private $CategorieVieillissement;

    /**
     * @ORM\Column(type="float")
     */
    private $DegreeAlcool;

    /**
     * @ORM\Column(type="integer")
     */
    private $NotePuissanceAlcool;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteAlcoolAlcool;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteAmertumeAlcool;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $Volume;
	
	/**
	* @ORM\ManyToOne(targetEntity="PaysFabrication")
	* @ORM\JoinColumn(name="idPaysFabrication", referencedColumnName="idPaysFabrication", nullable=false)
	*/
	private $PaysFabrication;
	
	/**
	* @ORM\ManyToOne(targetEntity="Couleur")
	* @ORM\JoinColumn(name="id_couleur", referencedColumnName="id_couleur", nullable=true)
	*/
	private $couleur;
	
	public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur(Couleur $couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }
	
    public function getTypeAlcool()
    {
        return $this->TypeAlcool;
    }

    public function setTypeAlcool(TypeAlcool $TypeAlcool): self
    {
        $this->TypeAlcool = $TypeAlcool;

        return $this;
    }    
	public function getCategorieVieillissement()
    {
        return $this->CategorieVieillissement;
    }

    public function setCategorieVieillissement(CategorieVieillissement $CategorieVieillissement): self
    {
        $this->CategorieVieillissement = $CategorieVieillissement;

        return $this;
    }

    public function getDegreeAlcool()
    {
        return $this->DegreeAlcool;
    }

    public function setDegreeAlcool(float $DegreeAlcool): self
    {
        $this->DegreeAlcool = $DegreeAlcool;

        return $this;
    }

    public function getNotePuissanceAlcool(): ?int
    {
        return $this->NotePuissanceAlcool;
    }

    public function setNotePuissanceAlcool(int $NotePuissanceAlcool): self
    {
        $this->NotePuissanceAlcool = $NotePuissanceAlcool;

        return $this;
    }

    public function getNoteAlcoolAlcool(): ?int
    {
        return $this->NoteAlcoolAlcool;
    }

    public function setNoteAlcoolAlcool(int $NoteAlcoolAlcool): self
    {
        $this->NoteAlcoolAlcool = $NoteAlcoolAlcool;

        return $this;
    }

    public function getNoteAmertumeAlcool(): ?int
    {
        return $this->NoteAmertumeAlcool;
    }

    public function setNoteAmertumeAlcool(int $NoteAmertumeAlcool): self
    {
        $this->NoteAmertumeAlcool = $NoteAmertumeAlcool;

        return $this;
    }

    public function getVolume()
    {
        return $this->Volume;
    }

    public function setVolume(string $Volume)
    {
        $this->Volume = $Volume;

        return $this;
    }

	
	public function getPaysFabrication()
    {
        return $this->PaysFabrication;
    }

    public function setPaysFabrication(PaysFabrication $PaysFabrication)
    {
        $this->PaysFabrication = $PaysFabrication;

        return $this;
    }
}
