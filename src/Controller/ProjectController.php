<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/project', name: 'project_')]
class ProjectController extends AbstractController
{
    private ProjectRepository $projectRepository;
    private EntityManagerInterface $entityManager;
    private Project $project;

    public function __construct (
        ProjectRepository $projectRepository, 
        EntityManagerInterface $entityManager,
    ){
        $this->projectRepository = $projectRepository;
        $this->entityManager = $entityManager;
    }

    #[Route('/all', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $this->projectRepository->findAll(),
        ]);
    }

    // #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    // public function new(Request $request): Response
    // {
    //     $project = new Project();
    //     $form = $this->createForm(ProjectType::class, $project);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->entityManager->persist($project);
    //         $this->entityManager->flush();

    //         return $this->redirectToRoute('project_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('project/new.html.twig', [
    //         'project' => $project,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'show', methods: ['GET'])]
    // public function show(Project $project): Response
    // {
    //     return $this->render('project/show.html.twig', [
    //         'project' => $project,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Project $project): Response
    // {
    //     $form = $this->createForm(ProjectType::class, $project);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->entityManager->flush();

    //         return $this->redirectToRoute('project_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('project/edit.html.twig', [
    //         'project' => $project,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'delete', methods: ['POST'])]
    // public function delete(Request $request, Project $project): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
    //         $this->entityManager->remove($project);
    //         $this->entityManager->flush();
    //     }

    //     return $this->redirectToRoute('project_index', [], Response::HTTP_SEE_OTHER);
    // }
}
