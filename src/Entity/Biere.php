<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BiereRepository")
 */
class Biere extends Produit
{
		
    /**
     * @ORM\Column(type="float")
     */
    private $DegreeBiere;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteAmertumeBiere;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteAlcoolBiere;

    /**
     * @ORM\Column(type="integer")
     */
    private $NotePuissanceBiere;


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
	
	/**
	* @ORM\ManyToOne(targetEntity="TypeBiere")
	* @ORM\JoinColumn(name="id_type_biere", referencedColumnName="id_type_biere", nullable=false)
	*/
	private $typeBiere;	
	
	/**
	* @ORM\ManyToOne(targetEntity="Brasserie")
	* @ORM\JoinColumn(name="id_brasserie", referencedColumnName="id_brasserie", nullable=false)
	*/
	private $brasserie;
	
	/**
	* @ORM\ManyToOne(targetEntity="Couleur")
	* @ORM\JoinColumn(name="id_couleur", referencedColumnName="id_couleur", nullable=false)
	*/
	private $couleur;
	
	public function __construct()
	{
		$this->typeConteneurs = new ArrayCollection();
	}
	
	public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur(Couleur $couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }	
	
	public function getBrasserie()
    {
        return $this->brasserie;
    }

    public function setBrasserie(Brasserie $brasserie)
    {
        $this->brasserie = $brasserie;

        return $this;
    }	
	
	// Notez le singulier, on ajoute une seule catégorie à la fois
	public function addTypeConteneur(TypeConteneur $TypeConteneur)
	{
	// Ici, on utilise l'ArrayCollection vraiment comme un tableau
	$this->typeConteneurs[] = $TypeConteneur;

	return $this;
	}

	public function removeTypeConteneur(TypeConteneur $TypeConteneur)
	{
	// Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
	$this->typeConteneurs->removeElement($TypeConteneur);
	}

	// Notez le pluriel, on récupère une liste de catégories ici !
	public function getTypeConteneurs()
	{
	return $this->typeConteneurs;
	}
		
	public function getTypeBiere()
    {
        return $this->typeBiere;
    }

    public function setTypeBiere(TypeBiere $TypeBiere)
    {
        $this->typeBiere = $TypeBiere;

        return $this;
    }
	
    public function getDegreeBiere(): ?float
    {
        return $this->DegreeBiere;
    }

    public function setDegreeBiere(float $DegreeBiere): self
    {
        $this->DegreeBiere = $DegreeBiere;

        return $this;
    }

    public function getNoteAmertumeBiere(): ?int
    {
        return $this->NoteAmertumeBiere;
    }

    public function setNoteAmertumeBiere(int $NoteAmertumeBiere): self
    {
        $this->NoteAmertumeBiere = $NoteAmertumeBiere;

        return $this;
    }

    public function getNoteAlcoolBiere(): ?int
    {
        return $this->NoteAlcoolBiere;
    }

    public function setNoteAlcoolBiere(int $NoteAlcoolBiere): self
    {
        $this->NoteAlcoolBiere = $NoteAlcoolBiere;

        return $this;
    }

    public function getNotePuissanceBiere(): ?int
    {
        return $this->NotePuissanceBiere;
    }

    public function setNotePuissanceBiere(int $NotePuissanceBiere): self
    {
        $this->NotePuissanceBiere = $NotePuissanceBiere;

        return $this;
    }

}
