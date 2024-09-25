<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StripeRepository")
 * @ApiResource()
 */
class Stripe
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
    private $id_transaction_stripe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_custumer_stripe;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTransactionStripe(): ?string
    {
        return $this->id_transaction_stripe;
    }

    public function setIdTransactionStripe(string $id_transaction_stripe): self
    {
        $this->id_transaction_stripe = $id_transaction_stripe;

        return $this;
    }

    public function getIdCustumerStripe(): ?string
    {
        return $this->id_custumer_stripe;
    }

    public function setIdCustumerStripe(string $id_custumer_stripe): self
    {
        $this->id_custumer_stripe = $id_custumer_stripe;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
