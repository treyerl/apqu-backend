<?php

namespace App\Entity;

use App\Repository\HeroRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ApiResource()]
#[ORM\Entity(repositoryClass: HeroRepository::class)]
class Hero
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $uuid = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $superpower = null;

    #[ORM\Column(length: 30)]
    private ?string $realname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aka = null;

    public function getUuid(): ?Uuid
    {
        return $this->uuid;
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

    public function getSuperpower(): ?string
    {
        return $this->superpower;
    }

    public function setSuperpower(?string $superpower): self
    {
        $this->superpower = $superpower;

        return $this;
    }

    public function getRealname(): ?string
    {
        return $this->realname;
    }

    public function setRealname(string $realname): self
    {
        $this->realname = $realname;

        return $this;
    }

    public function getAka(): ?string
    {
        return $this->aka;
    }

    public function setAka(?string $aka): self
    {
        $this->aka = $aka;

        return $this;
    }
}
