<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuggereRepository")
 */
class Suggere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_suggestion;

    public function getId()
    {
        return $this->id;
    }

    public function getDateSuggestion(): ?\DateTimeInterface
    {
        return $this->Date_suggestion;
    }

    public function setDateSuggestion(\DateTimeInterface $Date_suggestion): self
    {
        $this->Date_suggestion = $Date_suggestion;

        return $this;
    }
}
