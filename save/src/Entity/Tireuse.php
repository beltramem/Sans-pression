<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TireuseRepository")
 */
class Tireuse extends Biere
{
    /**
     * @ORM\Column(type="boolean")
     */
    private $Disponible_happy_hour_tireuse;


    public function getDisponible_Happy_Hour_Tireuse(): ?bool
    {
        return $this->Disponible_happy_hour_tireuse;
    }

    public function setDisponible_Happy_Hour_Tireuse(bool $Disponible_happy_hour_tireuse): self
    {
        $this->Disponible_happy_hour_tireuse = $Disponible_happy_hour_tireuse;

        return $this;
    }

    public function getID_Produit(): ?int
    {
        return $this->ID_produit;
    }

}
