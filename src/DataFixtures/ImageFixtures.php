<?php

namespace App\DataFixtures;
 
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class ImageFixtures extends Fixture
{
    private const IMAGE_REFERENCE = 'Image';
    
    public function load(ObjectManager $manager)
    {
        $nomsImage = [
            'Big King',
            'Big Mac',
            'Whooper',
        ];
 
        foreach ($nomsImage as $key => $nomImage) {
            $image = new Image();
            $image->nom = $nomImage;
            $manager->persist($image);
            $this->addReference(self::IMAGE_REFERENCE . '_' . $key, $image);
        }
 
        $manager->flush();
    }
}

?>