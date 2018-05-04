<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeDiversRepository")
 */
class TypeDivers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idTypeDivers;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomTypeDivers;

    public function getIdTypeDivers()
    {
        return $this->idTypeDivers;
    }

    public function getNomTypeDivers(): ?string
    {
        return $this->NomTypeDivers;
    }

    public function setNomTypeDivers(string $NomTypeDivers): self
    {
        $this->NomTypeDivers = $NomTypeDivers;

        return $this;
    }
}
