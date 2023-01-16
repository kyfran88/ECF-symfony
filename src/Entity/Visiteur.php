<?php

namespace App\Entity;

use App\Repository\VisiteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisiteurRepository::class)]
class Visiteur
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

    #[ORM\OneToMany(mappedBy: 'visiteur', targetEntity: MentionAllergies::class, orphanRemoval: true)]
    private Collection $MentionAllergies;

    public function __construct()
    {
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
            $mentionAllergy->setVisiteur($this);
        }

        return $this;
    }

    public function removeMentionAllergy(MentionAllergies $mentionAllergy): self
    {
        if ($this->MentionAllergies->removeElement($mentionAllergy)) {
            // set the owning side to null (unless already changed)
            if ($mentionAllergy->getVisiteur() === $this) {
                $mentionAllergy->setVisiteur(null);
            }
        }

        return $this;
    }
}
