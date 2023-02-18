<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $non_jour = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $etat = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heure_ouverture_am = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heure_fermeture_am = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heure_ouverture_pm = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heure_fermeture_pm = null;

    #[ORM\ManyToOne(inversedBy: 'horaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reservations $reservations = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNonJour(): ?string
    {
        return $this->non_jour;
    }

    public function setNonJour(string $non_jour): self
    {
        $this->non_jour = $non_jour;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getHeureOuvertureAm(): ?\DateTimeInterface
    {
        return $this->heure_ouverture_am;
    }

    public function setHeureOuvertureAm(?\DateTimeInterface $heure_ouverture_am): self
    {
        $this->heure_ouverture_am = $heure_ouverture_am;

        return $this;
    }

    public function getHeureFermetureAm(): ?\DateTimeInterface
    {
        return $this->heure_fermeture_am;
    }

    public function setHeureFermetureAm(?\DateTimeInterface $heure_fermeture_am): self
    {
        $this->heure_fermeture_am = $heure_fermeture_am;

        return $this;
    }

    public function getHeureOuverturePm(): ?\DateTimeInterface
    {
        return $this->heure_ouverture_pm;
    }

    public function setHeureOuverturePm(?\DateTimeInterface $heure_ouverture_pm): self
    {
        $this->heure_ouverture_pm = $heure_ouverture_pm;

        return $this;
    }

    public function getHeureFermeturePm(): ?\DateTimeInterface
    {
        return $this->heure_fermeture_pm;
    }

    public function setHeureFermeturePm(?\DateTimeInterface $heure_fermeture_pm): self
    {
        $this->heure_fermeture_pm = $heure_fermeture_pm;

        return $this;
    }

    public function getReservations(): ?Reservations
    {
        return $this->reservations;
    }

    public function setReservations(?Reservations $reservations): self
    {
        $this->reservations = $reservations;

        return $this;
    }

}
