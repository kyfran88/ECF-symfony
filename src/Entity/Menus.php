<?php

namespace App\Entity;

use App\Repository\MenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenusRepository::class)]
class Menus
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

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $id_categories = null;

    #[ORM\OneToMany(mappedBy: 'menus', targetEntity: plats::class, orphanRemoval: true)]
    private Collection $plats;

    #[ORM\ManyToOne(inversedBy: 'manus')]
    private ?Menuscategories $menuscategories = null;

    public function __construct()
    {
        $this->plats = new ArrayCollection();
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

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdCategories(): ?string
    {
        return $this->id_categories;
    }

    public function setIdCategories(?string $id_categories): self
    {
        $this->id_categories = $id_categories;

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
            $plat->setMenus($this);
        }

        return $this;
    }

    public function removePlat(plats $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getMenus() === $this) {
                $plat->setMenus(null);
            }
        }

        return $this;
    }

    public function getMenuscategories(): ?Menuscategories
    {
        return $this->menuscategories;
    }

    public function setMenuscategories(?Menuscategories $menuscategories): self
    {
        $this->menuscategories = $menuscategories;

        return $this;
    }
}
