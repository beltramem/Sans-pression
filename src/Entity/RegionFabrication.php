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
    private $IdRegionFabrication;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $NomRegion;
	
	/**
	* @ORM\ManyToOne(targetEntity="PaysFabrication")
	* @ORM\JoinColumn(name="idPaysFabrication", referencedColumnName="idPaysFabrication", nullable=false)
	*/
	private $PaysFabrication;

    public function getIdRegionFabrication()
    {
        return $this->IdRegionFabrication;
    }

    public function getNomRegion(): ?string
    {
        return $this->NomRegion;
    }

    public function setNomRegion(string $NomRegion): self
    {
        $this->NomRegion = $NomRegion;

        return $this;
    }
	
	public function getPaysFabrication()
    {
        return $this->PaysFabrication;
    }

    public function setPaysFabrication(PaysFabrication $PaysFabrication)
    {
        $this->PaysFabrication = $PaysFabrication;

        return $this;
    }
}
