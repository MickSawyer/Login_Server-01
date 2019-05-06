<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserPendingRepository")
 */
class UserPending
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
    private $UserName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $ConfirmationCode;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->UserName;
    }

    public function setUserName(string $UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getConfirmationCode(): ?string
    {
        return $this->ConfirmationCode;
    }

    public function setConfirmationCode(string $ConfirmationCode): self
    {
        $this->ConfirmationCode = $ConfirmationCode;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->CreatedDate;
    }

    public function setCreatedDate(\DateTimeInterface $CreatedDate): self
    {
        $this->CreatedDate = $CreatedDate;

        return $this;
    }
}
