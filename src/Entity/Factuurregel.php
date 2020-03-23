<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurregelRepository")
 */
class Factuurregel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Factuur", inversedBy="factuurregels")
     */
    private $factuurnr;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="factuurregels")
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $aantal;

    /**
     * @ORM\Column(type="integer")
     */
    private $korting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurnr(): ?Factuur
    {
        return $this->factuurnr;
    }

    public function setFactuurnr(?Factuur $factuurnr): self
    {
        $this->factuurnr = $factuurnr;

        return $this;
    }

    public function getOmschrijving(): ?Product
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(?Product $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getKorting(): ?int
    {
        return $this->korting;
    }

    public function setKorting(int $korting): self
    {
        $this->korting = $korting;

        return $this;
    }
}
