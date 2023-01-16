<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $client_id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_de_couverts = null;

    #[ORM\Column]
    private ?int $table_id = null;

    #[ORM\Column]
    private ?int $table_libre = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getNombreDeCouverts(): ?string
    {
        return $this->nombre_de_couverts;
    }

    public function setNombreDeCouverts(string $nombre_de_couverts): self
    {
        $this->nombre_de_couverts = $nombre_de_couverts;

        return $this;
    }

    public function getTableId(): ?int
    {
        return $this->table_id;
    }

    public function setTableId(int $table_id): self
    {
        $this->table_id = $table_id;

        return $this;
    }

    public function getTableLibre(): ?int
    {
        return $this->table_libre;
    }

    public function setTableLibre(int $table_libre): self
    {
        $this->table_libre = $table_libre;

        return $this;
    }
}
