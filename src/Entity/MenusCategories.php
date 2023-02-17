<?php

namespace App\Entity;

use App\Repository\MenusCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenusCategoriesRepository::class)]
class MenusCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\OneToMany(mappedBy: 'menuscategories', targetEntity: menus::class)]
    private Collection $manus;

    public function __construct()
    {
        $this->manus = new ArrayCollection();
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

    /**
     * @return Collection<int, menus>
     */
    public function getManus(): Collection
    {
        return $this->manus;
    }

    public function addManu(menus $manu): self
    {
        if (!$this->manus->contains($manu)) {
            $this->manus->add($manu);
            $manu->setMenuscategories($this);
        }

        return $this;
    }

    public function removeManu(menus $manu): self
    {
        if ($this->manus->removeElement($manu)) {
            // set the owning side to null (unless already changed)
            if ($manu->getMenuscategories() === $this) {
                $manu->setMenuscategories(null);
            }
        }

        return $this;
    }
}
