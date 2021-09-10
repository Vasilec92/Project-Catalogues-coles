<?php

namespace App\Controller;
use App\Entity\Module;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailModuleController extends AbstractController
{
    /**
     * @Route("/detail/module/{id}", name="detail_module")
     */
    public function index($id): Response
     
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reposotiry = $entityManager->getRepository(Module::class);
        $module = $reposotiry->find($id);
        
        return $this->render('detail_module/index.html.twig', [
            'module' => $module,
        ]);
    }
}
