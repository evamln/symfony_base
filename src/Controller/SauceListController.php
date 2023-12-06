<?php

namespace App\Controller;

use App\Repository\SauceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SauceListController extends AbstractController
{
    #[Route('/sauceList', name: 'app_sauce_list')]
    public function index(SauceRepository $repository): Response
    {
        $sauces = $repository->findAll();
        return $this->render('sauce_list/index.html.twig', [
            'controller_name' => 'SauceListController',
            'sauces' => $sauces,
        ]);
    }
}
