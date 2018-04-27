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
     * @ORM\Column(type="integer")
     */
    private $id_pays_fabrication;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_pays;

    public function getId_pays_fabrication()
    {
        return $this->id_pays_fabrication;
    }

    public function getNom_Pays(): ?string
    {
        return $this->nom_pays;
    }

    public function setNom_Pays(string $nom_pays): self
    {
        $this->nom_pays = $nom_pays;

        return $this;
    }
}
