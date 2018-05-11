<?php

namespace App\Controller;

use App\Entity\Couleur;
use App\Form\CouleurType;
use App\Repository\CouleurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("gestion/couleur")
 */
class CouleurController extends Controller
{
    /**
     * @Route("/", name="couleur_index", methods="GET")
     */
    public function index(CouleurRepository $couleurRepository): Response
    {
        return $this->render('couleur/index.html.twig', ['couleurs' => $couleurRepository->findAll()]);
    }

    /**
     * @Route("/new", name="couleur_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $couleur = new Couleur();
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($couleur);
            $em->flush();

            return $this->redirectToRoute('couleur_index');
        }

        return $this->render('couleur/new.html.twig', [
            'couleur' => $couleur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCouleur}", name="couleur_show", methods="GET")
     */
    public function show(Couleur $couleur): Response
    {
        return $this->render('couleur/show.html.twig', ['couleur' => $couleur]);
    }

    /**
     * @Route("/{idCouleur}/edit", name="couleur_edit", methods="GET|POST")
     */
    public function edit(Request $request, Couleur $couleur): Response
    {
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('couleur_edit', ['idCouleur' => $couleur->getidCouleur()]);
        }

        return $this->render('couleur/edit.html.twig', [
            'couleur' => $couleur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCouleur}", name="couleur_delete", methods="DELETE")
     */
    public function delete(Request $request, Couleur $couleur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$couleur->getidCouleur(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($couleur);
            $em->flush();
        }

        return $this->redirectToRoute('couleur_index');
    }
}
