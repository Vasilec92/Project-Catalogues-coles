<?php

namespace App\Controller;
use App\Entity\Ecole;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailEcoleController extends AbstractController
{
    /**
     * @Route("/detailecole/{id}", name="detail_ecole")
     */
    public function index($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reposotiry = $entityManager->getRepository(Ecole::class);
        $ecole = $reposotiry->find($id);
        return $this->render('detail_ecole/index.html.twig', [
            'ecole' => $ecole,
        ]);
    }
}
