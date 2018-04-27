<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeConteneurRepository")
 */
class TypeConteneur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_type_conteneur;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Nom_type_conteneur;

    public function getId_type_conteneur()
    {
        return $this->id_type_conteneur;
    }

    public function getNom_type_conteneur(): ?string
    {
        return $this->Nom_type_conteneur;
    }

    public function setNom_type_conteneur(string $Nom_type_conteneur): self
    {
        $this->Nom_type_conteneur = $Nom_type_conteneur;

        return $this;
    }
}
