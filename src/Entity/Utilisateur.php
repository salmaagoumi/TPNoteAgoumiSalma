<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_de_passe = null;

    #[ORM\Column(length: 255)]
    private ?string $role_utilisateur = null;

    /**
     * @var Collection<int, film>
     */
    #[ORM\ManyToMany(targetEntity: film::class, inversedBy: 'utilisateurs')]
    private Collection $films_fav;

    public function __construct()
    {
        $this->films_fav = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->Nom_utilisateur;
    }

    public function setNomUtilisateur(string $Nom_utilisateur): static
    {
        $this->Nom_utilisateur = $Nom_utilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->Prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $Prenom_utilisateur): static
    {
        $this->Prenom_utilisateur = $Prenom_utilisateur;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getRoleUtilisateur(): ?string
    {
        return $this->role_utilisateur;
    }

    public function setRoleUtilisateur(string $role_utilisateur): static
    {
        $this->role_utilisateur = $role_utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, film>
     */
    public function getFilmsFav(): Collection
    {
        return $this->films_fav;
    }

    public function addFilmsFav(film $filmsFav): static
    {
        if (!$this->films_fav->contains($filmsFav)) {
            $this->films_fav->add($filmsFav);
        }

        return $this;
    }

    public function removeFilmsFav(film $filmsFav): static
    {
        $this->films_fav->removeElement($filmsFav);

        return $this;
    }
}
