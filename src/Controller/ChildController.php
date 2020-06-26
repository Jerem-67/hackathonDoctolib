<?php

namespace App\Controller;

use App\Entity\Child;
use App\Entity\User;
use App\Form\ChildType;
use App\Repository\ChildRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/child")
 */
class ChildController extends AbstractController
{
    /**
     * @Route("/", name="child_index", methods={"GET"})
     */
    public function index(ChildRepository $childRepository): Response
    {
        return $this->render('child/index.html.twig', [
            'children' => $childRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="child_new", methods={"GET","POST"})
     * @param Request $request
     * @param UserInterface $user
     * @return Response
     */
    public function new(Request $request, UserInterface $user): Response
    {

            $child = new Child();
            $child->setUser($user);
            $form = $this->createForm(ChildType::class, $child);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($child);
                $entityManager->flush();

                return $this->redirectToRoute('child_index');
            }

            return $this->render('child/new.html.twig', [
                'child' => $child,
                'form' => $form->createView(),
            ]);
    }

    /**
     * @Route("/{id}", name="child_show", methods={"GET"})
     */
    public function show(Child $child): Response
    {
        $now = new \DateTime();
        $age = date_diff($now, $child->getBirthday());
        return $this->render('child/show.html.twig', [
            'child' => $child,
            'age' => $age,
        ]);

    }

    /**
     * @Route("/{id}/edit", name="child_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Child $child): Response
    {
        $form = $this->createForm(ChildType::class, $child);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('child_index');
        }

        return $this->render('child/edit.html.twig', [
            'child' => $child,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="child_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Child $child): Response
    {
        if ($this->isCsrfTokenValid('delete'.$child->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($child);
            $entityManager->flush();
        }

        return $this->redirectToRoute('child_index');
    }
}
