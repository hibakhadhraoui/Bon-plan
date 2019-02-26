<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanRepository")
 */
class Plan
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionCourt;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $descriptionLong;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="plans")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="plans")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produit", mappedBy="plan")
     */
    private $produits;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="plans")
     */
    private $city;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }

    public function getId() : ? int
    {
        return $this->id;
    }

    public function getName() : ? string
    {
        return $this->name;
    }

    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescriptionCourt() : ? string
    {
        return $this->descriptionCourt;
    }

    public function setDescriptionCourt(string $descriptionCourt) : self
    {
        $this->descriptionCourt = $descriptionCourt;

        return $this;
    }

    public function getDescriptionLong() : ? string
    {
        return $this->descriptionLong;
    }

    public function setDescriptionLong(? string $descriptionLong) : self
    {
        $this->descriptionLong = $descriptionLong;

        return $this;
    }

    public function getImage() : ? string
    {
        return $this->image;
    }

    public function setImage(? string $image) : self
    {
        $this->image = $image;

        return $this;
    }


    public function removeCity(City $city) : self
    {
        if ($this->cities->contains($city)) {
            $this->cities->removeElement($city);
            // set the owning side to null (unless already changed)
            if ($city->getPlan() === $this) {
                $city->setPlan(null);
            }
        }

        return $this;
    }

    public function getUser() : ? User
    {
        return $this->user;
    }

    public function setUser(? User $user) : self
    {
        $this->user = $user;

        return $this;
    }

    public function getCategory() : ? Category
    {
        return $this->category;
    }

    public function setCategory(? Category $category) : self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits() : Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit) : self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setPlan($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit) : self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getPlan() === $this) {
                $produit->setPlan(null);
            }
        }

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }
}
