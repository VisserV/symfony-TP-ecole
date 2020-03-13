<?php


namespace App\Controller;

use App\Repository\NewsRepository;
use App\Repository\SchoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default_index", methods={"GET"})
     */
    public function index(NewsRepository $newsRepository, SchoolRepository $schoolRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'news' => $newsRepository->findAll(),
            'school' => $schoolRepository->findOneBy([])
        ]);
    }

    /**
     * @Route("/informations", name="default_infos", methods={"GET"})
     */
    public function infos (SchoolRepository $schoolRepository): Response
    {
        return $this->render('default/informations.html.twig', [
            'school' => $schoolRepository->findOneBy([])
        ]);
    }
}
