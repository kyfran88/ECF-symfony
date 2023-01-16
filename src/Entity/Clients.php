<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'clients', targetEntity: CommandesPassée::class, orphanRemoval: true)]
    private Collection $CommandesPassée;

    #[ORM\OneToMany(mappedBy: 'clients', targetEntity: MentionAllergies::class, orphanRemoval: true)]
    private Collection $MentionAllergies;

    public function __construct()
    {
        $this->CommandesPassée = new ArrayCollection();
        $this->MentionAllergies = new ArrayCollection();
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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

    /**
     * @return Collection<int, CommandesPassée>
     */
    public function getCommandesPassée(): Collection
    {
        return $this->CommandesPassée;
    }

    public function addCommandesPassE(CommandesPassée $commandesPassE): self
    {
        if (!$this->CommandesPassée->contains($commandesPassE)) {
            $this->CommandesPassée->add($commandesPassE);
            $commandesPassE->setClients($this);
        }

        return $this;
    }

    public function removeCommandesPassE(CommandesPassée $commandesPassE): self
    {
        if ($this->CommandesPassée->removeElement($commandesPassE)) {
            // set the owning side to null (unless already changed)
            if ($commandesPassE->getClients() === $this) {
                $commandesPassE->setClients(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MentionAllergies>
     */
    public function getMentionAllergies(): Collection
    {
        return $this->MentionAllergies;
    }

    public function addMentionAllergy(MentionAllergies $mentionAllergy): self
    {
        if (!$this->MentionAllergies->contains($mentionAllergy)) {
            $this->MentionAllergies->add($mentionAllergy);
            $mentionAllergy->setClients($this);
        }

        return $this;
    }

    public function removeMentionAllergy(MentionAllergies $mentionAllergy): self
    {
        if ($this->MentionAllergies->removeElement($mentionAllergy)) {
            // set the owning side to null (unless already changed)
            if ($mentionAllergy->getClients() === $this) {
                $mentionAllergy->setClients(null);
            }
        }

        return $this;
    }
}
