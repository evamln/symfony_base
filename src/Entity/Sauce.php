<?php

namespace App\Entity;

use App\Repository\SauceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SauceRepository::class)]
class Sauce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;
 
    #[ORM\Column(length: 255)]
    public ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Burger::class, mappedBy: 'sauce')]
    private $burger;
}
