<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BurgerController extends AbstractController
{
    #[Route('/burger', name: 'app_burger')]
    public function index(): Response
    {
        $burgers = [
        ['name' => 'burger1',
        'src' => '../src/assets/burger-jamaicaine.jpg'],
         ['name' =>'burger2',
         'src' => '../src/assets/burger.jpeg'
         ]
        ];
        return $this->render('burger/index.html.twig', [
            'controller_name' => 'BurgerController',
            'burgers' => $burgers,
        ]);
    }
}
