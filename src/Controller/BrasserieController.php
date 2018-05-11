<?php

namespace App\Controller;

use App\Entity\Brasserie;
use App\Form\BrasserieType;
use App\Repository\BrasserieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("gestion/brasserie")
 */
class BrasserieController extends Controller
{
    /**
     * @Route("/", name="brasserie_index", methods="GET")
     */
    public function index(BrasserieRepository $brasserieRepository): Response
    {
        return $this->render('brasserie/index.html.twig', ['brasseries' => $brasserieRepository->findAll()]);
    }

    /**
     * @Route("/new", name="brasserie_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $brasserie = new Brasserie();
        $form = $this->createForm(BrasserieType::class, $brasserie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brasserie);
            $em->flush();

            return $this->redirectToRoute('brasserie_index');
        }

        return $this->render('brasserie/new.html.twig', [
            'brasserie' => $brasserie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idBrasserie}", name="brasserie_show", methods="GET")
     */
    public function show(Brasserie $brasserie): Response
    {
        return $this->render('brasserie/show.html.twig', ['brasserie' => $brasserie]);
    }

    /**
     * @Route("/{idBrasserie}/edit", name="brasserie_edit", methods="GET|POST")
     */
    public function edit(Request $request, Brasserie $brasserie): Response
    {
        $form = $this->createForm(BrasserieType::class, $brasserie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('brasserie_edit', ['idBrasserie' => $brasserie->getidBrasserie()]);
        }

        return $this->render('brasserie/edit.html.twig', [
            'brasserie' => $brasserie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idBrasserie}", name="brasserie_delete", methods="DELETE")
     */
    public function delete(Request $request, Brasserie $brasserie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$brasserie->getidBrasserie(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($brasserie);
            $em->flush();
        }

        return $this->redirectToRoute('brasserie_index');
    }
}
