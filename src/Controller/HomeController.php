<?php

namespace App\Controller;
use App\Entity\Ecole;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reposotiry = $entityManager->getRepository(Ecole::class);
        $ecoles = $reposotiry->findAll();

        
        return $this->render('home/index.html.twig', [
            'ecoles' => $ecoles,
        ]);
    }
}
