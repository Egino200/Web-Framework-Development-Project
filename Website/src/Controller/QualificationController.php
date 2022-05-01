<?php

namespace App\Controller;

use App\Entity\Qualification;
use App\Form\QualificationType;
use App\Repository\QualificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/qualification')]
class QualificationController extends AbstractController
{
    #[Route('/', name: 'app_qualification_index', methods: ['GET'])]
    public function index(QualificationRepository $qualificationRepository): Response
    {
        return $this->render('qualification/index.html.twig', [
            'qualifications' => $qualificationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_qualification_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QualificationRepository $qualificationRepository): Response
    {
        $qualification = new Qualification();
        $form = $this->createForm(QualificationType::class, $qualification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qualificationRepository->add($qualification);
            return $this->redirectToRoute('app_qualification_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qualification/new.html.twig', [
            'qualification' => $qualification,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_qualification_show', methods: ['GET'])]
    public function show(Qualification $qualification): Response
    {
        return $this->render('qualification/show.html.twig', [
            'qualification' => $qualification,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_qualification_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Qualification $qualification, QualificationRepository $qualificationRepository): Response
    {
        $form = $this->createForm(QualificationType::class, $qualification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qualificationRepository->add($qualification);
            return $this->redirectToRoute('app_qualification_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qualification/edit.html.twig', [
            'qualification' => $qualification,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_qualification_delete', methods: ['POST'])]
    public function delete(Request $request, Qualification $qualification, QualificationRepository $qualificationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$qualification->getId(), $request->request->get('_token'))) {
            $qualificationRepository->remove($qualification);
        }

        return $this->redirectToRoute('app_qualification_index', [], Response::HTTP_SEE_OTHER);
    }
}
