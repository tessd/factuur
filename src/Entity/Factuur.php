<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRepository")
 */
class Factuur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $factuurnr;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Klant", inversedBy="factuurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $klantnr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inzakeopdracht;

    /**
     * @ORM\Column(type="date")
     */
    private $factuurdatum;

    /**
     * @ORM\Column(type="date")
     */
    private $vervaldatum;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Factuurregel", mappedBy="factuurnr")
     */
    private $factuurregels;

    public function __construct()
    {
        $this->factuurregels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurnr(): ?int
    {
        return $this->factuurnr;
    }

    public function setFactuurnr(int $factuurnr): self
    {
        $this->factuurnr = $factuurnr;

        return $this;
    }

    public function getKlantnr(): ?Klant
    {
        return $this->klantnr;
    }

    public function setKlantnr(?Klant $klantnr): self
    {
        $this->klantnr = $klantnr;

        return $this;
    }

    public function getInzakeopdracht(): ?string
    {
        return $this->inzakeopdracht;
    }

    public function setInzakeopdracht(string $inzakeopdracht): self
    {
        $this->inzakeopdracht = $inzakeopdracht;

        return $this;
    }

    public function getFactuurdatum(): ?\DateTimeInterface
    {
        return $this->factuurdatum;
    }

    public function setFactuurdatum(\DateTimeInterface $factuurdatum): self
    {
        $this->factuurdatum = $factuurdatum;

        return $this;
    }

    public function getVervaldatum(): ?\DateTimeInterface
    {
        return $this->vervaldatum;
    }

    public function setVervaldatum(\DateTimeInterface $vervaldatum): self
    {
        $this->vervaldatum = $vervaldatum;

        return $this;
    }

    /**
     * @return Collection|Factuurregel[]
     */
    public function getFactuurregels(): Collection
    {
        return $this->factuurregels;
    }

    public function addFactuurregel(Factuurregel $factuurregel): self
    {
        if (!$this->factuurregels->contains($factuurregel)) {
            $this->factuurregels[] = $factuurregel;
            $factuurregel->setFactuurnr($this);
        }

        return $this;
    }

    public function removeFactuurregel(Factuurregel $factuurregel): self
    {
        if ($this->factuurregels->contains($factuurregel)) {
            $this->factuurregels->removeElement($factuurregel);
            // set the owning side to null (unless already changed)
            if ($factuurregel->getFactuurnr() === $this) {
                $factuurregel->setFactuurnr(null);
            }
        }

        return $this;
    }
}
