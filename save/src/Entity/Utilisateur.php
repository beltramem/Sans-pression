<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Mail_utilisateur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom_utilisateur;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Prenom_utilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $Droit_utilisateur;

    /**
     * @ORM\Column(type="date")
    */
    private $Date_naissance_utilisateur;
	
	/**
	* @ORM\OneToMany(targetEntity="Commentaire", mappedBy="utilisateur", cascade={"persist","remove"})
	* @ORM\JoinColumn(name="id_commentaire", referencedColumnName="id_commentaire", nullable=false)
	*/
	private $commentaires;
	
    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }
		

    public function getMail_Utilisateur(): ?string
    {
        return $this->Mail_utilisateur;
    }

    public function setMail_Utilisateur(string $Mail_utilisateur): self
    {
        $this->Mail_utilisateur = $Mail_utilisateur;

        return $this;
    }

    public function getNom_Utilisateur(): ?string
    {
        return $this->Nom_utilisateur;
    }

    public function setNom_Utilisateur(string $Nom_utilisateur): self
    {
        $this->Nom_utilisateur = $Nom_utilisateur;

        return $this;
    }

    public function getPrenom_Utilisateur(): ?string
    {
        return $this->Prenom_utilisateur;
    }

    public function setPrenom_Utilisateur(string $Prenom_utilisateur): self
    {
        $this->Prenom_utilisateur = $Prenom_utilisateur;

        return $this;
    }

    public function getDroit_Utiilisateur(): ?int
    {
        return $this->Droit_utiilisateur;
    }

    public function setDroit_Utilisateur(int $Droit_utiilisateur): self
    {
        $this->Droit_utiilisateur = $Droit_utiilisateur;

        return $this;
    }

    public function getDate_Naissance_Utilisateur()
    {
        return $this->Date_naissance_utilisateur;
    }

    public function setDate_Naissance_Utilisateur(\DateTimeInterface $Date_naissance_utilisateur): self
    {
        $this->Date_naissance_utilisateur = $Date_naissance_utilisateur;

        return $this;
    }
}
