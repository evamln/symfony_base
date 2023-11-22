<?php

namespace App\DataFixtures;
 
use App\Entity\Burger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class BurgerFixtures extends Fixture
{
    private const BURGER_REFERENCE = 'Burger';
    
    public function load(ObjectManager $manager)
    {

    }
}

?>