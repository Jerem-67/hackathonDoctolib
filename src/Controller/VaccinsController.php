<?php

namespace App\Controller;

use App\Entity\Vaccins;
use App\Form\VaccinsType;
use App\Repository\VaccinsRepository;
use App\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vaccins")
 */
class VaccinsController extends AbstractController
{
    /**
     * @Route("/", name="vaccins_index", methods={"GET"})
     */
    public function index(VaccinsRepository $vaccinsRepository): Response
    {
        return $this->render('vaccins/index.html.twig', [
            'vaccins' => $vaccinsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vaccins_new", methods={"GET","POST"})
     */
    public function new(Request $request, Mailer $mailer): Response
    {
        $vaccin = new Vaccins();
        $form = $this->createForm(VaccinsType::class, $vaccin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vaccin);
            $entityManager->flush();

            $mailer->sendmail('Vaccins à faire', 'jeremy67230@gmail.com', 'rappelVaccin', $form->getData());

            return $this->redirectToRoute('vaccins_index');
        }

        return $this->render('vaccins/new.html.twig', [
            'vaccin' => $vaccin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vaccins_show", methods={"GET"})
     */
    public function show(Vaccins $vaccin): Response
    {
        return $this->render('vaccins/show.html.twig', [
            'vaccin' => $vaccin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vaccins_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vaccins $vaccin): Response
    {
        $form = $this->createForm(VaccinsType::class, $vaccin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vaccins_index');
        }

        return $this->render('vaccins/edit.html.twig', [
            'vaccin' => $vaccin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vaccins_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vaccins $vaccin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vaccin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vaccin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vaccins_index');
    }
}
