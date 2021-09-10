<?php

namespace App\Controller;

use App\Entity\Ecole;
use App\Entity\Formation;
use App\Entity\Module;
use App\Form\EcoleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ecole")
 */
class EcoleController extends AbstractController
{
    /**
     * @Route("/", name="ecole_index", methods={"GET"})
     */
    public function index(): Response
    {
        $ecoles = $this->getDoctrine()
            ->getRepository(Ecole::class)
            ->findAll();

        
        $modules = $this->getDoctrine()
            ->getRepository(Module::class)
            ->findAll();

        $formations = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();

   

        return $this->render('ecole/index.html.twig', [
            'ecoles' => $ecoles,
            'formations' => $formations,
              'modules' => $modules,
        ]);
    }


    /**
     * @Route("/new", name="ecole_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ecole = new Ecole();
        $form = $this->createForm(EcoleType::class, $ecole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ecole);
            $entityManager->flush();

            return $this->redirectToRoute('ecole_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ecole/new.html.twig', [
            'ecole' => $ecole,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="ecole_show", methods={"GET"})
     */
    public function show(Ecole $ecole): Response



    {
        return $this->render('ecole/show.html.twig', [
            'ecole' => $ecole,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ecole_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ecole $ecole): Response
    {
        $form = $this->createForm(EcoleType::class, $ecole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecole_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ecole/edit.html.twig', [
            'ecole' => $ecole,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="ecole_delete", methods={"POST"})
     */
    public function delete(Request $request, Ecole $ecole): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ecole->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ecole);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ecole_index', [], Response::HTTP_SEE_OTHER);
    }

}
