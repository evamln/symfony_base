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

        $burger = new Burger();
        $burger->sauce = 'Blanche';
        $burger->oignon = 'Rouge';
        $burger->commentaire = 'Bof';
        $burger->pain = 'Blanc';
        $manager->persist($burger);
        $this->addReference(self::BURGER_REFERENCE . '_' . $burger);

    $manager->flush();
    }
}

?>