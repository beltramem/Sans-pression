<?php

namespace App\Controller;

use App\Entity\Tireuse;
use App\Form\TireuseType;
use App\Repository\TireuseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tireuse")
 */
class TireuseController extends Controller
{
    /**
     * @Route("/", name="tireuse_index", methods="GET")
     */
    public function index(TireuseRepository $tireuseRepository): Response
    {
        return $this->render('tireuse/index.html.twig', ['tireuses' => $tireuseRepository->findAll()]);
    }

    /**
     * @Route("/new", name="tireuse_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $tireuse = new Tireuse();
        $form = $this->createForm(TireuseType::class, $tireuse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tireuse);
            $em->flush();

            return $this->redirectToRoute('tireuse_index');
        }

        return $this->render('tireuse/new.html.twig', [
            'tireuse' => $tireuse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="tireuse_show", methods="GET")
     */
    public function show(Tireuse $tireuse): Response
    {
        return $this->render('tireuse/show.html.twig', ['tireuse' => $tireuse]);
    }

    /**
     * @Route("/{IdProduit}/edit", name="tireuse_edit", methods="GET|POST")
     */
    public function edit(Request $request, Tireuse $tireuse): Response
    {
        $form = $this->createForm(TireuseType::class, $tireuse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tireuse_edit', ['IdProduit' => $tireuse->getIdProduit()]);
        }

        return $this->render('tireuse/edit.html.twig', [
            'tireuse' => $tireuse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="tireuse_delete", methods="DELETE")
     */
    public function delete(Request $request, Tireuse $tireuse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tireuse->getIdProduit(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tireuse);
            $em->flush();
        }

        return $this->redirectToRoute('tireuse_index');
    }
}
