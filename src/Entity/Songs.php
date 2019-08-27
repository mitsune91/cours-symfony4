<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SongsRepository")
 */
class Songs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateProduction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $presentation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Artiste", inversedBy="songs")
     */
    private $compositeur;

    public function __construct()
    {
        $this->compositeur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateProduction(): ?\DateTimeInterface
    {
        return $this->dateProduction;
    }

    public function setDateProduction(\DateTimeInterface $dateProduction): self
    {
        $this->dateProduction = $dateProduction;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * @return Collection|Artiste[]
     */
    public function getCompositeur(): Collection
    {
        return $this->compositeur;
    }

    public function addCompositeur(Artiste $compositeur): self
    {
        if (!$this->compositeur->contains($compositeur)) {
            $this->compositeur[] = $compositeur;
        }

        return $this;
    }

    public function removeCompositeur(Artiste $compositeur): self
    {
        if ($this->compositeur->contains($compositeur)) {
            $this->compositeur->removeElement($compositeur);
        }

        return $this;
    }
}
