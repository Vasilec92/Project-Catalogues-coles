<?php

namespace App\Controller;
use App\Entity\Formation;
use App\Entity\Ecole;
use App\Form\AddFormationEcoleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddFormationController extends AbstractController
{
    /**
     * @Route("/add/formation/{id}", name="add_formation")
     */
    public function index(Request $request, $id): Response
    {
        $ecole= new Ecole();
        /* $form=$this->createForm(AddFormationEcoleType::class, NULL,['data' => $id]); */
         $form=$this->createForm(AddFormationEcoleType::class);
       
        $form->handleRequest($request);

        if ($form->isSubmitted()){

            $formation = $form->getData();
          
            
            $entityManager = $this->getDoctrine()->getManager();
            $reposotiry = $entityManager->getRepository(Ecole::class);
            $ecole = $reposotiry->find($id);
            $ecole->addFormation( $formation['nom']);
            

            $entityManager->persist($ecole);
            $entityManager->flush();  

           return $this->redirectToRoute('ecole_index');
        }


        return $this->render('add_formation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
