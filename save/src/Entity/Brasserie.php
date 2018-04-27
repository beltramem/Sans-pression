<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BrasserieRepository")
 */
class Brasserie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_brasserie;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_brasserie;
	
	/**
	* @ORM\ManyToOne(targetEntity="PaysFabrication")
	* @ORM\JoinColumn(name="id_pays_fabrication", referencedColumnName="id_pays_fabrication", nullable=false)
	*/
	private $pays_fabrication;

    public function getId_brasserie()
    {
        return $this->id_brasserie;
    }

    public function getnom_brasserie(): ?string
    {
        return $this->nom_brasserie;
    }

    public function setnom_brasserie(string $nom_brasserie): self
    {
        $this->nom_brasserie = $nom_brasserie;

        return $this;
    }
	
	public function getPays_fabrication()
    {
        return $this->pays_fabrication;
    }

    public function setPays_fabrication(PaysFabrication $pays_fabrication)
    {
        $this->pays_fabrication = $pays_fabrication;

        return $this;
    }
}
