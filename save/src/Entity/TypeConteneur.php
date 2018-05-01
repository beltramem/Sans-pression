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
    private $nomTypeConteneur;

    public function getId_type_conteneur()
    {
        return $this->id_type_conteneur;
    }

    public function getnomTypeConteneur(): ?string
    {
        return $this->nomTypeConteneur;
    }

    public function setnomTypeConteneur(string $nomTypeConteneur): self
    {
        $this->nomTypeConteneur = $nomTypeConteneur;

        return $this;
    }
}
