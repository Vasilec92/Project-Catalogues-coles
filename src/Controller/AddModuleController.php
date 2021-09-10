<?php

namespace App\Controller;
use App\Entity\Formation;
use App\Entity\Module;
use App\Form\AddModuleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddModuleController extends AbstractController
{
    /**
     * @Route("/add/module/{id}", name="add_module")
     */
    public function index(Request $request, $id): Response
      {
        $formation= new Formation();
        $form=$this->createForm(AddModuleType::class);
       
        $form->handleRequest($request);

        if ($form->isSubmitted()){

            $module = $form->getData();
          
            
            $entityManager = $this->getDoctrine()->getManager();
            $reposotiry = $entityManager->getRepository(Formation::class);
            $formation = $reposotiry->find($id);
           $formation->addModule( $module['nom']);
            

            $entityManager->persist($formation);
            $entityManager->flush();  

           return $this->redirectToRoute('ecole_index');
        }


        return $this->render('add_module/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/supprime/module/{id}", name="supprime_module")
     */
    public function supprime(Request $request, $id): Response
    {
        $formation= new Formation();
        $form=$this->createForm(AddModuleType::class);
       
        $form->handleRequest($request);

        if ($form->isSubmitted()){

            $module = $form->getData();
          
            
            $entityManager = $this->getDoctrine()->getManager();
            $reposotiry = $entityManager->getRepository(Formation::class);
            $formation = $reposotiry->find($id);
           $formation->removeModule( $module['nom']);
            

            $entityManager->persist($formation);
            $entityManager->flush();  

           return $this->redirectToRoute('ecole_index');
        }


        return $this->render('add_module/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
