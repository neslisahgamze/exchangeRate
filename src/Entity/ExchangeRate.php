<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExchangeRateRepository")
 */
class ExchangeRate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="provider", type="smallint", unique=true)
     */
    private $provider;

    /**
     * @ORM\Column(name="usd", type="decimal", precision=10, scale=5))
     */
    private $usd;

    /**
     * @ORM\Column(name="eur", type="decimal", precision=10, scale=5)
     */
    private $eur;

    /**
     * @ORM\Column(name="gbp", type="decimal", precision=10, scale=5))
     */
    private $gbp;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvider(): ?int
    {
        return $this->provider;
    }

    public function setProvider(int $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getUsd(): ?string
    {
        return $this->usd;
    }

    public function setUsd(string $eur): self
    {
        $this->usd = $usd;

        return $this;
    }

    public function getEur(): ?string
    {
        return $this->eur;
    }

    public function setEur(string $eur): self
    {
        $this->eur = $eur;

        return $this;
    }

    public function getGbp(): ?string
    {
        return $this->gbp;
    }

    public function setGbp(string $gbp): self
    {
        $this->gbp = $gbp;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
