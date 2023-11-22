<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
 
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $image = null;
 
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Commentaire $commentaire = null;

    #[ORM\ManyToOne(targetEntity: Pain::class, inversedBy: 'burger')]
    private ?Pain $pain = null;

    #[ORM\ManyToMany(targetEntity: Oignon::class, mappedBy: 'burger')]
    private $oignon;

    #[ORM\ManyToMany(targetEntity: Sauce::class, mappedBy: 'burger')]
    private $sauce;
}
