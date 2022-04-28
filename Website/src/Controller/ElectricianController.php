<?php

namespace App\Controller;

use App\Entity\Electrician;
use App\Form\ElectricianType;
use App\Repository\ElectricianRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/electrician')]
class ElectricianController extends AbstractController
{
    #[Route('/', name: 'app_electrician_index', methods: ['GET'])]
    public function index(ElectricianRepository $electricianRepository): Response
    {
        return $this->render('electrician/index.html.twig', [
            'electricians' => $electricianRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_electrician_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ElectricianRepository $electricianRepository): Response
    {
        $electrician = new Electrician();
        $form = $this->createForm(ElectricianType::class, $electrician);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $electricianRepository->add($electrician);
            return $this->redirectToRoute('app_electrician_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('electrician/new.html.twig', [
            'electrician' => $electrician,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_electrician_show', methods: ['GET'])]
    public function show(Electrician $electrician): Response
    {
        return $this->render('electrician/show.html.twig', [
            'electrician' => $electrician,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_electrician_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Electrician $electrician, ElectricianRepository $electricianRepository): Response
    {
        $form = $this->createForm(ElectricianType::class, $electrician);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $electricianRepository->add($electrician);
            return $this->redirectToRoute('app_electrician_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('electrician/edit.html.twig', [
            'electrician' => $electrician,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_electrician_delete', methods: ['POST'])]
    public function delete(Request $request, Electrician $electrician, ElectricianRepository $electricianRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$electrician->getId(), $request->request->get('_token'))) {
            $electricianRepository->remove($electrician);
        }

        return $this->redirectToRoute('app_electrician_index', [], Response::HTTP_SEE_OTHER);
    }
}
