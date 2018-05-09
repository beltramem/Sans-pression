<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\VinRepository")
 */
class Vin extends Produit
{

    /**
     * @ORM\Column(type="float")
     */
    private $DegreeVin;

    /**
     * @ORM\Column(type="integer")
     */
    private $NotePuissanceVin;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteAlcoolVin;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteAmertumeVin;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $Volume;
	
	/**
	* @ORM\Column(type="integer")
	* @Assert\Length(
	*      min = 4,
	*      max = 4
	*	)
	*/
	private $Annee;

	/**
	* @ORM\ManyToOne(targetEntity="Vignoble")
	* @ORM\JoinColumn(name="id_vignoble", referencedColumnName="id_vignoble", nullable=false)
	*/
	private $Vignoble;
	
	/**
	* @ORM\ManyToOne(targetEntity="Couleur")
	* @ORM\JoinColumn(name="id_couleur", referencedColumnName="id_couleur", nullable=false)
	*/
	private $Couleur;
	
	/**
	* @ORM\ManyToMany(targetEntity="TypeConteneur")
	*  * @ORM\JoinTable(name="biere_typeConteneur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_type_conteneur", referencedColumnName="id_type_conteneur")
     *   }
     * )
	*/
	private $typeConteneurs;
	
	public function getCouleur()
    {
        return $this->Couleur;
    }

    public function setCouleur(Couleur $Couleur)
    {
        $this->Couleur = $Couleur;

        return $this;
    }
	
	public function getVignoble()
    {
        return $this->Vignoble;
    }

    public function setVignoble(Vignoble $vignoble)
    {
        $this->Vignoble = $vignoble;

        return $this;
    }

    public function getDegreeVin(): ?float
    {
        return $this->DegreeVin;
    }

    public function setDegreeVin(float $DegreeVin): self
    {
        $this->DegreeVin = $DegreeVin;

        return $this;
    }

    public function getNotePuissanceVin(): ?int
    {
        return $this->NotePuissanceVin;
    }

    public function setNotePuissanceVin(int $NotePuissanceVin): self
    {
        $this->NotePuissanceVin = $NotePuissanceVin;

        return $this;
    }

    public function getNoteAlcoolVin(): ?int
    {
        return $this->NoteAlcoolVin;
    }

    public function setNoteAlcoolVin(int $NoteAlcoolVin): self
    {
        $this->NoteAlcoolVin = $NoteAlcoolVin;

        return $this;
    }

    public function getNoteAmertumeVin(): ?int
    {
        return $this->NoteAmertumeVin;
    }

    public function setNoteAmertumeVin(int $NoteAmertumeVin): self
    {
        $this->NoteAmertumeVin = $NoteAmertumeVin;

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
	
	public function getAnnee()
	{
	 return $this->Annee;
	}

	public function setAnnee($Annee)
	{
	 $this->Annee = $Annee;
	 return $this;
	}
	
	// Notez le singulier, on ajoute une seule catégorie à la fois
	public function addTypeConteneur(TypeConteneur $TypeConteneur)
	{
	// Ici, on utilise l'ArrayCollection vraiment comme un tableau
	$this->typeConteneurs[] = $TypeConteneur;

	return $this;
	}

	public function removeCategory(TypeConteneur $TypeConteneur)
	{
	// Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
	$this->typeConteneurs->removeElement($TypeConteneur);
	}

	// Notez le pluriel, on récupère une liste de catégories ici !
	public function getTypeConteneurs()
	{
	return $this->typeConteneurs;
	}

}
