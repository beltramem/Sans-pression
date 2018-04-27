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
    private $id_vignoble;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_vignoble;
	
	/**
	* @ORM\ManyToOne(targetEntity="PaysFabrication")
	* @ORM\JoinColumn(name="id_pays_fabrication", referencedColumnName="id_pays_fabrication", nullable=false)
	*/
	private $pays_fabrication;

    public function getId()
    {
        return $this->id;
    }

    public function getNom_Vignoble(): ?string
    {
        return $this->nom_vignoble;
    }

    public function setNom_Vignoble(string $nom_vignoble): self
    {
        $this->nom_vignoble = $nom_vignoble;

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
