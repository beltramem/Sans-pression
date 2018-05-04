<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=5)
     */
    private $Volume;

	/**
	* @ORM\ManyToOne(targetEntity="TypeConteneur")
	* @ORM\JoinColumn(name="id_type_conteneur", referencedColumnName="id_type_conteneur", nullable=false)
	*/
	private $typeConteneur;	
	
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
	
	public function getTypeBiere()
    {
        return $this->typeBiere;
    }

    public function setTypeBiere(Typebiere $typeBiere)
    {
        $this->typeBiere = $typeBiere;

        return $this;
    }
	
	public function getTypeConteneur()
    {
        return $this->typeConteneur;
    }

    public function setTypeConteneur(Typeconteneur $typeConteneur)
    {
        $this->typeConteneur = $typeConteneur;

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

    public function getVolume()
    {
        return $this->Volume;
    }

    public function setVolume(string $Volume)
    {
        $this->Volume = $Volume;

        return $this;
    }

}
