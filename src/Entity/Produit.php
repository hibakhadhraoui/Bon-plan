<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionLong;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $primaryImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SecondaryImage1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SecondaryImage2;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plan", inversedBy="produits")
     */
    private $plan;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescriptionCourt(): ?string
    {
        return $this->descriptionCourt;
    }

    public function setDescriptionCourt(string $descriptionCourt): self
    {
        $this->descriptionCourt = $descriptionCourt;

        return $this;
    }

    public function getDescriptionLong(): ?string
    {
        return $this->descriptionLong;
    }

    public function setDescriptionLong(?string $descriptionLong): self
    {
        $this->descriptionLong = $descriptionLong;

        return $this;
    }

    public function getPrimaryImage(): ?string
    {
        return $this->primaryImage;
    }

    public function setPrimaryImage(string $primaryImage): self
    {
        $this->primaryImage = $primaryImage;

        return $this;
    }

    public function getSecondaryImage1(): ?string
    {
        return $this->SecondaryImage1;
    }

    public function setSecondaryImage1(?string $SecondaryImage1): self
    {
        $this->SecondaryImage1 = $SecondaryImage1;

        return $this;
    }

    public function getSecondaryImage2(): ?string
    {
        return $this->SecondaryImage2;
    }

    public function setSecondaryImage2(?string $SecondaryImage2): self
    {
        $this->SecondaryImage2 = $SecondaryImage2;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPlan(): ?Plan
    {
        return $this->plan;
    }

    public function setPlan(?Plan $plan): self
    {
        $this->plan = $plan;

        return $this;
    }
}
