<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VignobleRepository")
 */
class Vignoble
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $IdVignoble;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomVignoble;
	
	/**
	* @ORM\ManyToOne(targetEntity="RegionFabrication")
	* @ORM\JoinColumn(name="id_region_fabrication", referencedColumnName="id_region_fabrication", nullable=false)
	*/
	private $RegionFabrication;

    public function getIdVignoble()
    {
        return $this->IdVignoble;
    }

    public function getNomVignoble(): ?string
    {
        return $this->NomVignoble;
    }

    public function setNomVignoble(string $NomVignoble): self
    {
        $this->NomVignoble = $NomVignoble;

        return $this;
    }
	
	public function getRegionFabrication()
    {
        return $this->RegionFabrication;
    }

    public function setRegionFabrication(RegionFabrication $RegionFabrication)
    {
        $this->RegionFabrication = $RegionFabrication;

        return $this;
    }
}
