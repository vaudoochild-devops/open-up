<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 * @ApiResource()
 */
class Message
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
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     * @Column(type="string", columnDefinition="ENUM('read', 'unread', 'archived')")
     */
    private $status_user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Column(type="string", columnDefinition="ENUM('read', 'unread', 'archived')")
     */
    private $status_admin;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Admin", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getStatusUser(): ?string
    {
        return $this->status_user;
    }

    public function setStatusUser(string $status_user): self
    {
        $this->status_user = $status_user;

        return $this;
    }

    public function getStatusAdmin(): ?string
    {
        return $this->status_admin;
    }

    public function setStatusAdmin(string $status_admin): self
    {
        $this->status_admin = $status_admin;

        return $this;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(Admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
