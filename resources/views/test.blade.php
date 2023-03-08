<?php

namespace App\Controller;

use App\Entity\DemandeMission;
use App\Form\DemandeMissionType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemandeMissionController extends AbstractController
{
    #[Route('/a', name: 'app_demande_mission')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(DemandeMission::class);
        $Mission = $repository->findAll();
        return $this->render('mission/index.html.twig', [
            'Mission' => $Mission,
        ]);
    }
    #[Route('/Mission/{id<[0-9]+>}', name: 'show_Mission')]
    public function show(ManagerRegistry $doctrine, $id)
    {
        $repository = $doctrine->getRepository(DemandeMission::class);
        $Mission = $repository->find($id);
        return $this->render('mission/show.html.twig', [
            'Mission' => $Mission,
        ]);
    }
    #[Route('/mission/create', name: 'Mission_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $mission = new DemandeMission;
        // $form = $this->createFormBuilder($article)
        //     ->add('reference')
        //     ->add('libelle')
        //     ->add('prix')
        //     ->getForm();

        $form = $this->createForm(DemandeMissionType::class, $mission);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($mission);
            $em->flush();

            return $this->redirectToRoute('app_demande_mission');
        }

        return $this->renderForm('mission/create.html.twig', ['formMission' => $form]);
    }
}
