<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $couverts = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heures = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $id_clients = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $clients = null;

    #[ORM\OneToMany(mappedBy: 'reservations', targetEntity: plats::class, orphanRemoval: true)]
    private Collection $plats;

    #[ORM\OneToMany(mappedBy: 'reservations', targetEntity: horaires::class, orphanRemoval: true)]
    private Collection $horaires;

    public function __construct()
    {
        $this->plats = new ArrayCollection();
        $this->horaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouverts(): ?string
    {
        return $this->couverts;
    }

    public function setCouverts(string $couverts): self
    {
        $this->couverts = $couverts;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeures(): ?\DateTimeInterface
    {
        return $this->heures;
    }

    public function setHeures(\DateTimeInterface $heures): self
    {
        $this->heures = $heures;

        return $this;
    }

    public function getIdClients(): ?string
    {
        return $this->id_clients;
    }

    public function setIdClients(?string $id_clients): self
    {
        $this->id_clients = $id_clients;

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->clients;
    }

    public function setClients(?Clients $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * @return Collection<int, plats>
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(plats $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats->add($plat);
            $plat->setReservations($this);
        }

        return $this;
    }

    public function removePlat(plats $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getReservations() === $this) {
                $plat->setReservations(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, horaires>
     */
    public function getHoraires(): Collection
    {
        return $this->horaires;
    }

    public function addHoraire(horaires $horaire): self
    {
        if (!$this->horaires->contains($horaire)) {
            $this->horaires->add($horaire);
            $horaire->setReservations($this);
        }

        return $this;
    }

    public function removeHoraire(horaires $horaire): self
    {
        if ($this->horaires->removeElement($horaire)) {
            // set the owning side to null (unless already changed)
            if ($horaire->getReservations() === $this) {
                $horaire->setReservations(null);
            }
        }

        return $this;
    }
}
