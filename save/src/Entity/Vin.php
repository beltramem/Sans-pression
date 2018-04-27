<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VinRepository")
 */
class Vin extends Produit
{

    /**
     * @ORM\Column(type="float")
     */
    private $Degree_vin;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_puissance_vin;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_alcool_vin;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_amertume_vin;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $Volume;

    /**
     * @ORM\Column(type="integer")
     */
    private $ID_vignoble;
	
	/**
	* @ORM\ManyToOne(targetEntity="Vignoble")
	* @ORM\JoinColumn(name="id_vignoble", referencedColumnName="id_vignoble", nullable=false)
	*/
	private $vignoble;
	
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
	
	public function getVignoble()
    {
        return $this->vignoble;
    }

    public function setBrasserie(Vignoble $vignoble)
    {
        $this->vignoble = $vignoble;

        return $this;
    }

    public function getDegree_Vin(): ?float
    {
        return $this->Degree_vin;
    }

    public function setDegree_Vin(float $Degree_vin): self
    {
        $this->Degree_vin = $Degree_vin;

        return $this;
    }

    public function getNote_Puissance_Vin(): ?int
    {
        return $this->Note_puissance_vin;
    }

    public function setNote_Puissance_Vin(int $Note_puissance_vin): self
    {
        $this->Note_puissance_vin = $Note_puissance_vin;

        return $this;
    }

    public function getNote_Alcool_Vin(): ?int
    {
        return $this->Note_alcool_vin;
    }

    public function setNote_Alcool_Vin(int $Note_alcool_vin): self
    {
        $this->Note_alcool_vin = $Note_alcool_vin;

        return $this;
    }

    public function getNote_Amertume_Vin(): ?int
    {
        return $this->Note_amertume_vin;
    }

    public function setNote_Amertume_Vin(int $Note_amertume_vin): self
    {
        $this->Note_amertume_vin = $Note_amertume_vin;

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


    public function getID_Vignoble(): ?int
    {
        return $this->ID_vignoble;
    }

    public function setID_Vignoble(int $ID_vignoble): self
    {
        $this->ID_vignoble = $ID_vignoble;

        return $this;
    }
}
