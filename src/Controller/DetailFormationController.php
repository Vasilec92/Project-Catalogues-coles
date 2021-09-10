<?php

namespace App\Controller;
use App\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailFormationController extends AbstractController
{
    /**
     * @Route("/detailformation/{id}", name="detail_formation")
     */
    public function index($id): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $reposotiry = $entityManager->getRepository(Formation::class);
        $formation = $reposotiry->find($id);
        return $this->render('detail_formation/index.html.twig', [
            'formation' => $formation,
        ]);
    }
}
