<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TireuseRepository")
 */
class Tireuse
{
	/**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idTireuse;
	
    /**
     * @ORM\Column(type="boolean")
     */
    private $DisponibleHappyHourTireuse;
	
	/**
	* @ORM\OneToOne(targetEntity="Biere")
	* @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit", nullable=false)
	*/
	private $Biere;

	public function getidTireuse()
    {
        return $this->idTireuse;
    }
	
    public function getDisponibleHappyHourTireuse(): ?bool
    {
        return $this->DisponibleHappyHourTireuse;
    }

    public function setDisponibleHappyHourTireuse(bool $DisponibleHappyHourTireuse): self
    {
        $this->DisponibleHappyHourTireuse = $DisponibleHappyHourTireuse;

        return $this;
    }
	
	public function getBiere()
    {
        return $this->Biere;
    }

    public function setBiere(Biere $Biere)
    {
        $this->Biere = $Biere;
    }
}
