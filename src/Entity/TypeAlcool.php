<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeAlcoolRepository")
 */
class TypeAlcool
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idTypeAlcool;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomTypeAlcool;

    public function getIdTypeAlcool()
    {
        return $this->idTypeAlcool;
    }

    public function getNomTypeAlcool(): ?string
    {
        return $this->NomTypeAlcool;
    }

    public function setNomTypeAlcool(string $NomTypeAlcool): self
    {
        $this->NomTypeAlcool = $NomTypeAlcool;

        return $this;
    }
}
