<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlcoolRepository")
 */
class Alcool extends Produit
{

    /**
     * @ORM\Column(type="integer")
     */
    private $Type_alcool;

    /**
     * @ORM\Column(type="float")
     */
    private $Degree_alcool;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_puissance_alcool;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_alcool_alcool;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_amertume_alcool;

    /**
     * @ORM\Column(type="float")
     */
    private $Volume;

    public function getID_alcool()
    {
        return $this->ID_alcool;
    }
	
    public function getType_Alcool(): ?int
    {
        return $this->Type_alcool;
    }

    public function setType_Alcool(int $Type_alcool): self
    {
        $this->Type_alcool = $Type_alcool;

        return $this;
    }

    public function getDegree_Alcool(): ?int
    {
        return $this->Degree_alcool;
    }

    public function setDegree_Alcool(int $Degree_alcool): self
    {
        $this->Degree_alcool = $Degree_alcool;

        return $this;
    }

    public function getNote_Puissance_Alcool(): ?int
    {
        return $this->Note_puissance_alcool;
    }

    public function setNote_Puissance_Alcool(int $Note_puissance_alcool): self
    {
        $this->Note_puissance_alcool = $Note_puissance_alcool;

        return $this;
    }

    public function getNote_Alcool_Alcool(): ?int
    {
        return $this->Note_alcool_alcool;
    }

    public function setNote_Alcool_Alcool(int $Note_alcool_alcool): self
    {
        $this->Note_alcool_alcool = $Note_alcool_alcool;

        return $this;
    }

    public function getNote_Amertume_Alcool(): ?int
    {
        return $this->Note_amertume_alcool;
    }

    public function setNote_Amertume_Alcool(int $Note_amertume_alcool): self
    {
        $this->Note_amertume_alcool = $Note_amertume_alcool;

        return $this;
    }

    public function getVolume(): ?float
    {
        return $this->Volume;
    }

    public function setVolume(float $Volume): self
    {
        $this->Volume = $Volume;

        return $this;
    }
}
