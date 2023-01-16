<?php

namespace App\Entity;

use App\Repository\CommandesPasséeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandesPasséeRepository::class)]
class CommandesPassée
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $temps_de_commande = null;

    #[ORM\Column]
    private ?int $client_id = null;

    #[ORM\ManyToOne(inversedBy: 'CommandesPassée')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $clients = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTempsDeCommande(): ?\DateTimeInterface
    {
        return $this->temps_de_commande;
    }

    public function setTempsDeCommande(\DateTimeInterface $temps_de_commande): self
    {
        $this->temps_de_commande = $temps_de_commande;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;

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
}
