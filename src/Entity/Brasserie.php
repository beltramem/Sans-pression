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
    private $idBrasserie;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomBrasserie;
	
	/**
	* @ORM\ManyToOne(targetEntity="PaysFabrication")
	* @ORM\JoinColumn(name="idPaysFabrication", referencedColumnName="idPaysFabrication", nullable=false)
	*/
	private $paysFabrication;

    public function getidBrasserie()
    {
        return $this->idBrasserie;
    }

    public function getnomBrasserie(): ?string
    {
        return $this->nomBrasserie;
    }

    public function setnomBrasserie(string $nomBrasserie): self
    {
        $this->nomBrasserie = $nomBrasserie;

        return $this;
    }
	
	public function getPaysFabrication()
    {
        return $this->paysFabrication;
    }

    public function setPaysFabrication(PaysFabrication $paysFabrication)
    {
        $this->paysFabrication = $paysFabrication;

        return $this;
    }
}
