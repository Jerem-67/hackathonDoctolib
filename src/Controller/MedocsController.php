<?php

namespace App\Controller;

use App\Entity\Medocs;
use App\Form\MedocsType;
use App\Repository\MedocsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medocs")
 */
class MedocsController extends AbstractController
{
    /**
     * @Route("/", name="medocs_index", methods={"GET"})
     */
    public function index(MedocsRepository $medocsRepository): Response
    {
        return $this->render('medocs/index.html.twig', [
            'medocs' => $medocsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="medocs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $medoc = new Medocs();
        $form = $this->createForm(MedocsType::class, $medoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medoc);
            $entityManager->flush();

            return $this->redirectToRoute('medocs_index');
        }

        return $this->render('medocs/new.html.twig', [
            'medoc' => $medoc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medocs_show", methods={"GET"})
     */
    public function show(Medocs $medoc): Response
    {
        return $this->render('medocs/show.html.twig', [
            'medoc' => $medoc,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="medocs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medocs $medoc): Response
    {
        $form = $this->createForm(MedocsType::class, $medoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medocs_index');
        }

        return $this->render('medocs/edit.html.twig', [
            'medoc' => $medoc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medocs_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Medocs $medoc): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medoc->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medoc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('medocs_index');
    }
}
