<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompteUtilisateurRepository")
 */
class CompteUtilisateur
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
    private $mail_utilisateur;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Nom_utilisateur;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $prenom_utilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $droit_utilisateur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_naissance_utilisateur;
	
	/**
	* @ORM\OneToMany(targetEntity="Commentaire", mappedBy="utilisateur")
	* @ORM\JoinColumn(name="id_commentaire", referencedColumnName="id_commentaire")
	*/
	private $commentaires;


	public function __construct()
	{
		$this->commentaires = new ArrayCollection();
		$this->Date_naissance_utilisateur = new \Datetime();
	}

	public function addCommentaire(Commentaire $commentaire)
	{
	$this->commentaires[] = $commentaire;

	return $this;
	}

	public function removeCommentaire(Commentaire $commentaire)
	{
	$this->commentaires->removeElement($commentaire);
	}

	public function getCommentaires()
	{
	return $this->commentaires;
	}
	

    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }

    public function getMail_Utilisateur(): ?string
    {
        return $this->mail_utilisateur;
    }

    public function setMail_Utilisateur(string $mail_utilisateur): self
    {
        $this->mail_utilisateur = $mail_utilisateur;

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
        return $this->prenom_utilisateur;
    }

    public function setPrenom_Utilisateur(string $prenom_utilisateur): self
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    public function getDroit_Utilisateur(): ?int
    {
        return $this->droit_utilisateur;
    }

    public function setDroit_Utilisateur(int $droit_utilisateur): self
    {
        $this->droit_utilisateur = $droit_utilisateur;

        return $this;
    }

    public function getDate_Naissance_Utilisateur()
    {
        return $this->Date_naissance_utilisateur;
    }

    public function setDate_Naissance_Utilisateur($Date_naissance_utilisateur)
    {
        $this->Date_naissance_utilisateur = $Date_naissance_utilisateur;

        return $this;
    }
}
