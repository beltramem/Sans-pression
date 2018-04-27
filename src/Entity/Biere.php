<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BiereRepository")
 * @ORM\MappedSuperclass
 * @ORM\Table(name = "biere")
 * @ORM\DiscriminatorColumn(name="Tireuse", type="integer")
 * @ORM\DiscriminatorMap({"1" = "Biere", "2" = "Tireuse"})
 */
class Biere extends Produit
{

    /**
     * @ORM\Column(type="float")
     */
    private $Degree_biere;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_amertume_biere;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_alcool_biere;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_puissance_biere;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $Volume;

	/**
	* @ORM\ManyToOne(targetEntity="TypeConteneur")
	* @ORM\JoinColumn(name="id_type_conteneur", referencedColumnName="id_type_conteneur", nullable=false)
	*/
	private $type_conteneur;	
	
	/**
	* @ORM\ManyToOne(targetEntity="TypeBiere")
	* @ORM\JoinColumn(name="id_type_biere", referencedColumnName="id_type_biere", nullable=false)
	*/
	private $type_biere;	
	
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
        return $this->type_biere;
    }

    public function setTypeBiere(Typebiere $type_biere)
    {
        $this->type_biere = $type_biere;

        return $this;
    }
	
	public function getTypeConteneur()
    {
        return $this->type_conteneur;
    }

    public function setTypeConteneur(Typeconteneur $type_conteneur)
    {
        $this->type_conteneur = $type_conteneur;

        return $this;
    }
	
    public function getDegreeBiere(): ?float
    {
        return $this->Degree_biere;
    }

    public function setDegreeBiere(float $Degree_biere): self
    {
        $this->Degree_biere = $Degree_biere;

        return $this;
    }

    public function getNoteAmertumeBiere(): ?int
    {
        return $this->Note_amertume_biere;
    }

    public function setNoteAmertumeBiere(int $Note_amertume_biere): self
    {
        $this->Note_amertume_biere = $Note_amertume_biere;

        return $this;
    }

    public function getNoteAlcoolBiere(): ?int
    {
        return $this->Note_alcool_biere;
    }

    public function setNoteAlcoolBiere(int $Note_alcool_biere): self
    {
        $this->Note_alcool_biere = $Note_alcool_biere;

        return $this;
    }

    public function getNotePuissanceBiere(): ?int
    {
        return $this->Note_puissance_biere;
    }

    public function setNotePuissanceBiere(int $Note_puissance_biere): self
    {
        $this->Note_puissance_biere = $Note_puissance_biere;

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

    public function getIdProduit()
    {
        return $this->Idproduit;
    }

    public function setIdProduit($produit)
    {
        $this->Idproduit = $produit;

        return $this;
    }
}
