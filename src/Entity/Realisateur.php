<?php

namespace App\Entity;

use App\Repository\RealisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealisateurRepository::class)]
class Realisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_realisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom_realisateur = null;

    /**
     * @var Collection<int, Film>
     */
    #[ORM\OneToMany(targetEntity: Film::class, mappedBy: 'id_realisateur')]
    private Collection $films;

    public function __construct()
    {
        $this->films = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRealisateur(): ?string
    {
        return $this->Nom_realisateur;
    }

    public function setNomRealisateur(string $Nom_realisateur): static
    {
        $this->Nom_realisateur = $Nom_realisateur;

        return $this;
    }

    public function getPrenomRealisateur(): ?string
    {
        return $this->Prenom_realisateur;
    }

    public function setPrenomRealisateur(string $Prenom_realisateur): static
    {
        $this->Prenom_realisateur = $Prenom_realisateur;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Film $film): static
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->setIdRealisateur($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): static
    {
        if ($this->films->removeElement($film)) {
            // set the owning side to null (unless already changed)
            if ($film->getIdRealisateur() === $this) {
                $film->setIdRealisateur(null);
            }
        }

        return $this;
    }
}
