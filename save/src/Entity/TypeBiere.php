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
    private $Nom_type_biere;

    public function getidTypeBiere()
    {
        return $this->idTypeBiere;
    }

    public function getNom_Type_Biere(): ?string
    {
        return $this->Nom_type_biere;
    }

    public function setNom_Type_Biere(string $Nom_type_biere): self
    {
        $this->Nom_type_biere = $Nom_type_biere;

        return $this;
    }
}
