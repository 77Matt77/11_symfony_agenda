<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

// DON'T forget the following use statement!!!
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
#[UniqueEntity('email', message:"cet email appartient déja à un contact")]
#[UniqueEntity('phone', message: "Ce numéro de téléphone appartient déja à un contact")]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'le prénom est obligatoire')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'le prénom ne doit pas dépasser {{ limit }} caractèrs',
    )]
    #[ORM\Column(length: 255)]
    private ?string $firstName = null;


    #[Assert\NotBlank(message: 'le prénom est obligatoire')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'le prénom ne doit pas dépasser {{ limit }} caractèrs',
    )]
    #[ORM\Column(length: 255)]
    private ?string $lastName = null;


    #[Assert\NotBlank(message: "l'email est obligatoire")]
    #[Assert\Length(
        max: 255,
        maxMessage: 'le prénom ne doit pas dépasser {{ limit }} caractèrs',
    )]
    #[Assert\Email(
        message: "l' email ne doit pas dépasser {{ value }} n'est pas valide.",
    )]

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;


    #[Assert\NotBlank(message: "l'email est obligatoire")]
    #[Assert\Length(
        max: 255,
        maxMessage: 'le numéro de téléphonene doit pas dépasser {{ limit }} caractèrs',
    )]
    #[Assert\Regex(
        pattern: '/^[0-9\s\-\+\(\)]{6,30}$/',
        match: true,
        message: "le numéro de téléphone n'est pas valide",
    )]
    #[ORM\Column(length: 255, unique: true)]
    private ?string $phone = null;


 #[Assert\Length(
        max: 1000,
        maxMessage: 'le commentaire ne doit pas dépasser {{ limit }} caractèrs',
    )]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
