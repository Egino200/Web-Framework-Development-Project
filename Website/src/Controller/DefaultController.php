<?php

namespace App\Controller;

use App\Repository\JobRepository;
use App\Repository\QualificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;



class DefaultController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $template = 'default/index.html.twig';
        $argsArray = [];

        return $this->render($template, $argsArray);
    }
    #[Route('/electrician', name: 'electrician')]
    public function electrician(UserRepository $userRepository ,QualificationRepository $qualificationRepository): Response
    {
        $template = 'default/electrician.html.twig';
        $argsArray = ['users'=>$userRepository-> findAll(), 'qualifications' =>$qualificationRepository->findAll()];

        return $this->render($template, $argsArray);
    }
    #[Route('/portfolio', name: 'portfolio')]
    public function portfolio(JobRepository $jobRepository ): Response
    {
        $template = 'default/portfolio.html.twig';
        $argsArray = ['jobs'=>$jobRepository-> findAll()];

        return $this->render($template, $argsArray);
    }

}
