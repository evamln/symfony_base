<?php

namespace App\DataFixtures;
 
use App\Entity\Pain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class PainFixtures extends Fixture
{
    private const PAIN_REFERENCE = 'Pain';
    
    public function load(ObjectManager $manager)
    {
        $nomsPain = [
            'Blanc',
            'Avoigne',
            'Miel',
        ];
 
        foreach ($nomsPain as $key => $nomPain) {
            $pain = new Pain();
            $pain->nom = $nomPain;
            $manager->persist($pain);
            $this->addReference(self::PAIN_REFERENCE . '_' . $key, $pain);
        }
 
        $manager->flush();
    }
}

?>