<?php

namespace App\Controller;

use App\Entity\Biere;
use App\Form\Biere1Type;
use App\Repository\BiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/biere")
 */
class BiereController extends Controller
{
    /**
     * @Route("/", name="biere_index", methods="GET")
     */
    public function index(BiereRepository $biereRepository): Response
    {
        return $this->render('biere/index.html.twig', ['bieres' => $biereRepository->findAll()]);
    }

    /**
     * @Route("/new", name="biere_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $biere = new Biere();
        $form = $this->createForm(Biere1Type::class, $biere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($biere);
            $em->flush();

            return $this->redirectToRoute('biere_index');
        }

        return $this->render('biere/new.html.twig', [
            'biere' => $biere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="biere_show", methods="GET")
     */
    public function show(Biere $biere): Response
    {
        return $this->render('biere/show.html.twig', ['biere' => $biere]);
    }

    /**
     * @Route("/{IdProduit}/edit", name="biere_edit", methods="GET|POST")
     */
    public function edit(Request $request, Biere $biere): Response
    {
        $form = $this->createForm(Biere1Type::class, $biere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('biere_edit', ['IdProduit' => $biere->getIdProduit()]);
        }

        return $this->render('biere/edit.html.twig', [
            'biere' => $biere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="biere_delete", methods="DELETE")
     */
    public function delete(Request $request, Biere $biere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$biere->getIdProduit(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($biere);
            $em->flush();
        }

        return $this->redirectToRoute('biere_index');
    }
}
