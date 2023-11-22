<?php

namespace App\DataFixtures;
 
use App\Entity\Oignon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class OignonFixtures extends Fixture
{
    private const OIGNON_REFERENCE = 'Oignon';
    
    public function load(ObjectManager $manager)
    {
        $nomsOignon = [
            'Rouge',
            'Grillés',
            'Fris',
        ];
 
        foreach ($nomsOignon as $key => $nomOignon) {
            $oignon = new Oignon();
            $oignon->nom = $nomOignon;
            $manager->persist($oignon);
            $this->addReference(self::OIGNON_REFERENCE . '_' . $key, $oignon);
        }
 
        $manager->flush();
    }
}

?>