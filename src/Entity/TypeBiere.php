<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeBiereRepository")
 */
class TypeBiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idTypeBiere;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $NomTypeBiere;

    public function getIdTypeBiere()
    {
        return $this->idTypeBiere;
    }

    public function getNomTypeBiere(): ?string
    {
        return $this->NomTypeBiere;
    }

    public function setNomTypeBiere(string $NomTypeBiere): self
    {
        $this->NomTypeBiere = $NomTypeBiere;

        return $this;
    }
}
