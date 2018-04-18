<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BiereRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"biere" = "Biere", "tireuse" = "Tireuse"})
*/
class Biere extends Produit
{

    /**
     * @ORM\Column(type="float")
     */
    private $Degree_biere;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_amertume_biere;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_alcool_biere;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note_puissance_biere;

    /**
     * @ORM\Column(type="float")
     */
    private $Volume;

    public function getDegree_Biere(): ?float
    {
        return $this->Degree_biere;
    }

    public function setDegree_Biere(float $Degree_biere): self
    {
        $this->Degree_biere = $Degree_biere;

        return $this;
    }

    public function getNote_Amertume_Biere(): ?int
    {
        return $this->Note_amertume_biere;
    }

    public function setNote_Amertume_Biere(int $Note_amertume_biere): self
    {
        $this->Note_amertume_biere = $Note_amertume_biere;

        return $this;
    }

    public function getNote_Alcool_Biere(): ?int
    {
        return $this->Note_alcool_biere;
    }

    public function setNote_Alcool_Biere(int $Note_alcool_biere): self
    {
        $this->Note_alcool_biere = $Note_alcool_biere;

        return $this;
    }

    public function getNote_Puissance_Biere(): ?int
    {
        return $this->Note_puissance_biere;
    }

    public function setNote_Puissance_Biere(int $Note_puissance_biere): self
    {
        $this->Note_puissance_biere = $Note_puissance_biere;

        return $this;
    }

    public function get_Volume(): ?float
    {
        return $this->Volume;
    }

    public function set_Volume(float $Volume): self
    {
        $this->Volume = $Volume;

        return $this;
    }

    public function getID_Produit(): ?int
    {
        return $this->ID_produit;
    }

    public function setID_Produit(int $ID_produit): self
    {
        $this->ID_produit = $ID_produit;

        return $this;
    }
}
