<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShopRepository")
 * @ApiResource()
 */
class Shop
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
     * @ORM\Column(type="float")
     */
    private $X_coordinate;

    /**
     * @ORM\Column(type="float")
     */
    private $Y_coordinate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ShopType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shopType;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Trader", cascade={"persist", "remove"})
     */
    private $trader;

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

    public function getShopType(): ?ShopType
    {
        return $this->shopType;
    }

    public function setShopType(?ShopType $shopType): self
    {
        $this->shopType = $shopType;

        return $this;
    }

    public function getTrader(): ?Trader
    {
        return $this->trader;
    }

    public function setTrader(?Trader $trader): self
    {
        $this->trader = $trader;

        return $this;
    }
}
