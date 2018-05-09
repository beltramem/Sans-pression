<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeConteneurRepository")
 */
class TypeConteneur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idTypeConteneur;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomTypeConteneur;
	
	/**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Biere", mappedBy="typeConteneurs")
     */
    private $biere;
	
	/**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Vin", mappedBy="typeConteneurs")
     */
    private $vin;	
	
	/**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Alcool", mappedBy="typeConteneurs")
     */
    private $alcool;
	
	/**
     * @ORM\Column(type="string", length=5)
     */
    private $Volume;
	
    public function getidTypeConteneur()
    {
        return $this->idTypeConteneur;
    }

    public function getNomTypeConteneur()
    {
        return $this->nomTypeConteneur;
    }

    public function setNomTypeConteneur(string $nomTypeConteneur)
    {
        $this->nomTypeConteneur = $nomTypeConteneur;

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
	
	public function __toString()
	{
		$string =$this->getNomTypeConteneur().' '.$this->getVolume();
		return $string;
	}
}
