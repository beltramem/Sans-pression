<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieVieillissementRepository")
 */
class CategorieVieillissement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idCategorieVieillissement;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $NomCategorieVieillissement;

    public function getIdCategorieVieillissement()
    {
        return $this->idCategorieVieillissement;
    }

    public function getNomCategorieVieillissement(): ?string
    {
        return $this->NomCategorieVieillissement;
    }

    public function setNomCategorieVieillissement(string $NomCategorieVieillissement): self
    {
        $this->NomCategorieVieillissement = $NomCategorieVieillissement;

        return $this;
    }
}
