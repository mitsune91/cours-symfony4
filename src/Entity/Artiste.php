<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtisteRepository")
 */
class Artiste
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="text")
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Events", mappedBy="artiste")
     */
    private $events;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Songs", mappedBy="compositeur")
     */
    private $songs;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->songs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Events[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Events $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setArtiste($this);
        }

        return $this;
    }

    public function removeEvent(Events $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getArtiste() === $this) {
                $event->setArtiste(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Songs[]
     */
    public function getSongs(): Collection
    {
        return $this->songs;
    }

    public function addSong(Songs $song): self
    {
        if (!$this->songs->contains($song)) {
            $this->songs[] = $song;
            $song->addCompositeur($this);
        }

        return $this;
    }

    public function removeSong(Songs $song): self
    {
        if ($this->songs->contains($song)) {
            $this->songs->removeElement($song);
            $song->removeCompositeur($this);
        }

        return $this;
    }
}
