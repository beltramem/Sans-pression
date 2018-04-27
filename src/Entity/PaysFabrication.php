<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaysFabricationRepository")
 */
class PaysFabrication
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="idPaysFabrication",type="integer")
     */
    private $idPaysFabrication;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomPays;

    public function getIdPaysFabrication()
    {
        return $this->idPaysFabrication;
    }

    public function getnomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(string $nomPays): self
    {
        $this->nomPays = $nomPays;

        return $this;
    }
}
