<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\ManyToMany(targetEntity=Foodtrucks::class, inversedBy="sites")
     */
    private $code;

    public function __construct()
    {
        $this->code = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection<int, Foodtrucks>
     */
    public function getCode(): Collection
    {
        return $this->code;
    }

    public function addCode(Foodtrucks $code): self
    {
        if (!$this->code->contains($code)) {
            $this->code[] = $code;
        }

        return $this;
    }

    public function removeCode(Foodtrucks $code): self
    {
        $this->code->removeElement($code);

        return $this;
    }
}
