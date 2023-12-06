<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\SauceType;
use App\Entity\Sauce;

class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'creation', methods: ['GET', 'POST'])]
    public function creation(Request $request, EntityManagerInterface $em): Response
    {
        $sauce = new Sauce();
        $form = $this->createForm(SauceType::class, $sauce);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($sauce);
            $em->flush();
     
            $this->addFlash('success', 'Sauce créé!');
            return $this->redirectToRoute('app_sauce_list');   
        }
     
        return $this->render('sauce/index.html.twig', [
            'sauce' => $sauce,
            'form' => $form->createView()
        ]);
    }
}
