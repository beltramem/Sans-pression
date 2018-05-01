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
	* @ORM\JoinColumn(name="idTypeBiere", referencedColumnName="idTypeBiere", nullable=false)
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
	
	public function getType_biere()
    {
        return $this->type_biere;
    }

    public function setType_biere(Typebiere $type_biere)
    {
        $this->type_biere = $type_biere;

        return $this;
    }
	
	public function getType_conteneur()
    {
        return $this->type_conteneur;
    }

    public function setType_conteneur(Typeconteneur $type_conteneur)
    {
        $this->type_conteneur = $type_conteneur;

        return $this;
    }
	
    public function getDegree_Biere(): ?float
    {
        return $this->Degree_biere;
    }

    public function setDegree_Biere(float $Degree_biere): self
    {
        $this->Degree_biere = $Degree_biere;

        return $this;
    }

    public function getNote_amertume_biere(): ?int
    {
        return $this->Note_amertume_biere;
    }

    public function setNote_amertume_biere(int $Note_amertume_biere): self
    {
        $this->Note_amertume_biere = $Note_amertume_biere;

        return $this;
    }

    public function getNote_alcool_biere(): ?int
    {
        return $this->Note_alcool_biere;
    }

    public function setNote_alcool_biere(int $Note_alcool_biere): self
    {
        $this->Note_alcool_biere = $Note_alcool_biere;

        return $this;
    }

    public function getNote_puissance_biere(): ?int
    {
        return $this->Note_puissance_biere;
    }

    public function setNote_puissance_biere(int $Note_puissance_biere): self
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

    public function getID_Produit(): ?int
    {
        return $this->ID_produit;
    }

    public function setID_Produit(int $ID_produit): self
    {
        $this->ID_produit = $ID_produit;

        return $this;
    }
}
