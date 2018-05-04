<?php

namespace App\Controller;

use App\Entity\Vignoble;
use App\Form\VignobleType;
use App\Repository\VignobleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vignoble")
 */
class VignobleController extends Controller
{
    /**
     * @Route("/", name="vignoble_index", methods="GET")
     */
    public function index(VignobleRepository $vignobleRepository): Response
    {
        return $this->render('vignoble/index.html.twig', ['vignobles' => $vignobleRepository->findAll()]);
    }

    /**
     * @Route("/new", name="vignoble_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $vignoble = new Vignoble();
        $form = $this->createForm(VignobleType::class, $vignoble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vignoble);
            $em->flush();

            return $this->redirectToRoute('vignoble_index');
        }

        return $this->render('vignoble/new.html.twig', [
            'vignoble' => $vignoble,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdVignoble}", name="vignoble_show", methods="GET")
     */
    public function show(Vignoble $vignoble): Response
    {
        return $this->render('vignoble/show.html.twig', ['vignoble' => $vignoble]);
    }

    /**
     * @Route("/{IdVignoble}/edit", name="vignoble_edit", methods="GET|POST")
     */
    public function edit(Request $request, Vignoble $vignoble): Response
    {
        $form = $this->createForm(VignobleType::class, $vignoble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vignoble_edit', ['IdVignoble' => $vignoble->getIdVignoble()]);
        }

        return $this->render('vignoble/edit.html.twig', [
            'vignoble' => $vignoble,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdVignoble}", name="vignoble_delete", methods="DELETE")
     */
    public function delete(Request $request, Vignoble $vignoble): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vignoble->getIdVignoble(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vignoble);
            $em->flush();
        }

        return $this->redirectToRoute('vignoble_index');
    }
}
