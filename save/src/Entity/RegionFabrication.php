<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegionFabricationRepository")
 */
class RegionFabrication
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_region_fabrication;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_region;
	
	/**
	* @ORM\ManyToOne(targetEntity="PaysFabrication")
	* @ORM\JoinColumn(name="id_pays_fabrication", referencedColumnName="id_pays_fabrication", nullable=false)
	*/
	private $pays_fabrication;

    public function getId()
    {
        return $this->id;
    }

    public function getNom_Region(): ?string
    {
        return $this->nom_region;
    }

    public function setNom_Region(string $nom_region): self
    {
        $this->nom_region = $nom_region;

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
