<?php

namespace App\DataFixtures;
 
use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class CommentaireFixtures extends Fixture
{
    private const COMMENTAIRE_REFERENCE = 'Commentaire';
    
    public function load(ObjectManager $manager)
    {
        $nomsCommentaire = [
            'Très bon',
            'Bof',
            'Il est la',
        ];
 
        foreach ($nomsCommentaire as $key => $nomCommentaire) {
            $commentaire = new Commentaire();
            $commentaire->nom = $nomCommentaire;
            $manager->persist($commentaire);
            $this->addReference(self::COMMENTAIRE_REFERENCE . '_' . $key, $commentaire);
        }
 
        $manager->flush();
    }
}

?>