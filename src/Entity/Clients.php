<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nbr_couverts_par_defaut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mention_allergies = null;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNbrCouvertsParDefaut(): ?string
    {
        return $this->nbr_couverts_par_defaut;
    }

    public function setNbrCouvertsParDefaut(?string $nbr_couverts_par_defaut): self
    {
        $this->nbr_couverts_par_defaut = $nbr_couverts_par_defaut;

        return $this;
    }

    public function getMentionAllergies(): ?string
    {
        return $this->mention_allergies;
    }

    public function setMentionAllergies(?string $mention_allergies): self
    {
        $this->mention_allergies = $mention_allergies;

        return $this;
    }
}
