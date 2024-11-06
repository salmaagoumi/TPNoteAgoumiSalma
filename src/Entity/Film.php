<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre_du_film = null;

    #[ORM\Column]
    private ?int $duree_du_film = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $anee_sortie_film = null;

    #[ORM\ManyToOne(inversedBy: 'films')]
    #[ORM\JoinColumn(nullable: false)]
    private ?realisateur $id_realisateur = null;

    /**
     * @var Collection<int, Jouer>
     */
    #[ORM\OneToMany(targetEntity: Jouer::class, mappedBy: 'identifiant_film')]
    private Collection $joueursFilms;

    /**
     * @var Collection<int, Jouer>
     */
    #[ORM\OneToMany(targetEntity: Jouer::class, mappedBy: 'id_acteur')]
    private Collection $acteurs;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'films_fav')]
    private Collection $utilisateurs;

    public function __construct()
    {
        $this->joueursFilms = new ArrayCollection();
        $this->acteurs = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreDuFilm(): ?string
    {
        return $this->titre_du_film;
    }

    public function setTitreDuFilm(string $titre_du_film): static
    {
        $this->titre_du_film = $titre_du_film;

        return $this;
    }

    public function getDureeDuFilm(): ?int
    {
        return $this->duree_du_film;
    }

    public function setDureeDuFilm(int $duree_du_film): static
    {
        $this->duree_du_film = $duree_du_film;

        return $this;
    }

    public function getAneeSortieFilm(): ?\DateTimeInterface
    {
        return $this->anee_sortie_film;
    }

    public function setAneeSortieFilm(\DateTimeInterface $anee_sortie_film): static
    {
        $this->anee_sortie_film = $anee_sortie_film;

        return $this;
    }

    public function getIdRealisateur(): ?realisateur
    {
        return $this->id_realisateur;
    }

    public function setIdRealisateur(?realisateur $id_realisateur): static
    {
        $this->id_realisateur = $id_realisateur;

        return $this;
    }

    /**
     * @return Collection<int, Jouer>
     */
    public function getJoueursFilms(): Collection
    {
        return $this->joueursFilms;
    }

    public function addJoueursFilm(Jouer $joueursFilm): static
    {
        if (!$this->joueursFilms->contains($joueursFilm)) {
            $this->joueursFilms->add($joueursFilm);
            $joueursFilm->setIdentifiantFilm($this);
        }

        return $this;
    }

    public function removeJoueursFilm(Jouer $joueursFilm): static
    {
        if ($this->joueursFilms->removeElement($joueursFilm)) {
            // set the owning side to null (unless already changed)
            if ($joueursFilm->getIdentifiantFilm() === $this) {
                $joueursFilm->setIdentifiantFilm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Jouer>
     */
    public function getActeurs(): Collection
    {
        return $this->acteurs;
    }

    public function addActeur(Jouer $acteur): static
    {
        if (!$this->acteurs->contains($acteur)) {
            $this->acteurs->add($acteur);
            $acteur->setIdActeur($this);
        }

        return $this;
    }

    public function removeActeur(Jouer $acteur): static
    {
        if ($this->acteurs->removeElement($acteur)) {
            // set the owning side to null (unless already changed)
            if ($acteur->getIdActeur() === $this) {
                $acteur->setIdActeur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->addFilmsFav($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            $utilisateur->removeFilmsFav($this);
        }

        return $this;
    }
}
