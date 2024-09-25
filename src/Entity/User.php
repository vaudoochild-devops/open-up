<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ApiResource()
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $X_coordinate;

    /**
     * @ORM\Column(type="float")
     */
    private $Y_coordinate;

    /**
     * @ORM\Column(type="float")
     */
    private $balance_wallet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account")
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Order", mappedBy="user")
     */
    private $orders;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Gratification", inversedBy="users")
     */
    private $gratification;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->gratification = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getXCoordinate(): ?float
    {
        return $this->X_coordinate;
    }

    public function setXCoordinate(float $X_coordinate): self
    {
        $this->X_coordinate = $X_coordinate;

        return $this;
    }

    public function getYCoordinate(): ?float
    {
        return $this->Y_coordinate;
    }

    public function setYCoordinate(float $Y_coordinate): self
    {
        $this->Y_coordinate = $Y_coordinate;

        return $this;
    }

    public function getBalanceWallet(): ?float
    {
        return $this->balance_wallet;
    }

    public function setBalanceWallet(float $balance_wallet): self
    {
        $this->balance_wallet = $balance_wallet;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->addUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            $order->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Gratification[]
     */
    public function getGratification(): Collection
    {
        return $this->gratification;
    }

    public function addGratification(Gratification $gratification): self
    {
        if (!$this->gratification->contains($gratification)) {
            $this->gratification[] = $gratification;
        }

        return $this;
    }

    public function removeGratification(Gratification $gratification): self
    {
        if ($this->gratification->contains($gratification)) {
            $this->gratification->removeElement($gratification);
        }

        return $this;
    }
}
