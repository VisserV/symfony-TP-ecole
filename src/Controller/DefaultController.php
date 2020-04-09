<?php


namespace App\Controller;

use App\Entity\Child;
use App\Form\Type\ChildType;
use App\Repository\NewsRepository;
use App\Repository\SchoolRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function infos(SchoolRepository $schoolRepository): Response
    {
        return $this->render('default/informations.html.twig', [
            'school' => $schoolRepository->findOneBy([])
        ]);
    }

    /**
     * @Route("/espace-enfant", name="default_enfant", methods={"GET"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function enfant(SchoolRepository $schoolRepository): Response
    {
        if (!$this->getUser()->hasChildren()) {
            return $this->redirectToRoute('default_inscription');
        }

        return $this->render('default/enfant.html.twig', [
            'school' => $schoolRepository->findOneBy([]),
            'children' => $this->getUser()->getChildren()
        ]);
    }

    /**
     * @Route("/inscription", name="default_inscription", methods={"GET", "POST"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function inscription(SchoolRepository $schoolRepository, Request $request): Response
    {
        $child = new Child();
        $form = $this->createForm(ChildType::class, $child);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $child->addParent($this->getUser());
            $child->setAcceptedInAskedClass(false);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($child);
            $entityManager->flush();

            return $this->redirectToRoute('default_enfant');
        }

        return $this->render('default/inscription.html.twig', [
            'school' => $schoolRepository->findOneBy([]),
            'child' => $child,
            'form' => $form->createView(),
            'errors' => $form->getErrors(true)
        ]);
    }
}
