<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CouleurRepository")
 */
class Couleur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_couleur;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_couleur;
	
    public function getId_couleur()
    {
        return $this->id_couleur;
    }

    public function getNomCouleur(): ?string
    {
        return $this->nom_couleur;
    }

    public function setNomCouleur(string $nom_couleur): self
    {
        $this->nom_couleur = $nom_couleur;

        return $this;
    }
}
