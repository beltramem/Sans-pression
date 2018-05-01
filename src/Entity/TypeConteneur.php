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
    private $idTypeConteneur;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomTypeConteneur;

    public function getidTypeConteneur()
    {
        return $this->idTypeConteneur;
    }

    public function getNomTypeConteneur()
    {
        return $this->nomTypeConteneur;
    }

    public function setNomTypeConteneur(string $nomTypeConteneur)
    {
        $this->nomTypeConteneur = $nomTypeConteneur;

        return $this;
    }
}
