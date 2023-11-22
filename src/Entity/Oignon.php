<?php

namespace App\Entity;

use App\Repository\OignonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OignonRepository::class)]
class Oignon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    public ?string $nom = null;
    public function getId(): ?int
    {
        return $this->id;
    }
    #[ORM\ManyToMany(targetEntity: Burger::class, mappedBy: 'oignon')]
    private $burger;
}
