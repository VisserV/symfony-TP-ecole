<?php


namespace App\Controller;

use App\Entity\Child;
use App\Entity\CorrespondenceBookNote;
use App\Form\Type\ChildType;
use App\Form\Type\CorrespondenceBookNoteType;
use App\Repository\ChildRepository;
use App\Repository\CorrespondenceBookNoteRepository;
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
            'news' => $newsRepository->findBy([], ['updatedAt' => 'DESC']),
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

    /**
     * @Route("/messages", name="default_message", methods={"GET", "POST"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function message(SchoolRepository $schoolRepository, Request $request): Response
    {
        if (!$this->getUser()->hasChildren()) {
            return $this->redirectToRoute('default_inscription');
        }

        return $this->render('default/message.html.twig', [
            'school' => $schoolRepository->findOneBy([])
        ]);
    }

    /**
     * @Route("/cahier-de-correspondance", name="default_correspondence", methods={"GET"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function correspondence(SchoolRepository $schoolRepository, Request $request, ChildRepository $childRepository): Response
    {
        if (!$this->getUser()->hasChildren() && !$this->isGranted('ROLE_TEACHER')) {
            return $this->redirectToRoute('default_inscription');
        }

        return $this->render('default/correspondence.html.twig', [
            'school' => $schoolRepository->findOneBy([])
        ]);
    }

    /**
     * @Route("/ecrire-dans-un-cahier-de-correspondance", name="default_correspondence_new", methods={"GET", "POST"})
     * @IsGranted("ROLE_TEACHER")
     */
    public function correspondenceNew(SchoolRepository $schoolRepository, Request $request): Response
    {
        $note = new CorrespondenceBookNote();
        $note->setWritter($this->getUser());
        $note->setSentDate(new \DateTime('now'));
        $form = $this->createForm(CorrespondenceBookNoteType::class, $note);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($note);
            $entityManager->flush();

            return $this->redirectToRoute('default_correspondence');
        }

        return $this->render('default/correspondenceNew.html.twig', [
            'school' => $schoolRepository->findOneBy([]),
            'note' => $note,
            'form' => $form->createView(),
            'errors' => $form->getErrors(true)
        ]);
    }

    /**
     * @Route("/lire-la-note-du-cahier-de-correspondance/{noteId}", name="default_correspondence_read", methods={"GET"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function correspondenceRead(int $noteId, CorrespondenceBookNoteRepository $noteRepository)
    {
        $note = $noteRepository->find($noteId);
        $note->setSeenDate(new \DateTime('now'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('default_correspondence');
    }
}
