<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteRepository::class)]
class Carte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'carte', targetEntity: MenuCategories::class, orphanRemoval: true)]
    private Collection $MenuCategories;

    #[ORM\OneToMany(mappedBy: 'carte', targetEntity: PlatCategories::class, orphanRemoval: true)]
    private Collection $PlatCategories;

    public function __construct()
    {
        $this->MenuCategories = new ArrayCollection();
        $this->PlatCategories = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, MenuCategories>
     */
    public function getMenuCategories(): Collection
    {
        return $this->MenuCategories;
    }

    public function addMenuCategory(MenuCategories $menuCategory): self
    {
        if (!$this->MenuCategories->contains($menuCategory)) {
            $this->MenuCategories->add($menuCategory);
            $menuCategory->setCarte($this);
        }

        return $this;
    }

    public function removeMenuCategory(MenuCategories $menuCategory): self
    {
        if ($this->MenuCategories->removeElement($menuCategory)) {
            // set the owning side to null (unless already changed)
            if ($menuCategory->getCarte() === $this) {
                $menuCategory->setCarte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlatCategories>
     */
    public function getPlatCategories(): Collection
    {
        return $this->PlatCategories;
    }

    public function addPlatCategory(PlatCategories $platCategory): self
    {
        if (!$this->PlatCategories->contains($platCategory)) {
            $this->PlatCategories->add($platCategory);
            $platCategory->setCarte($this);
        }

        return $this;
    }

    public function removePlatCategory(PlatCategories $platCategory): self
    {
        if ($this->PlatCategories->removeElement($platCategory)) {
            // set the owning side to null (unless already changed)
            if ($platCategory->getCarte() === $this) {
                $platCategory->setCarte(null);
            }
        }

        return $this;
    }
}
