<?php

namespace App\Controller;

use App\Entity\TypeBiere;
use App\Form\TypeBiereType;
use App\Repository\TypeBiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("gestion/type/biere")
 */
class TypeBiereController extends Controller
{
    /**
     * @Route("/", name="type_biere_index", methods="GET")
     */
    public function index(TypeBiereRepository $typeBiereRepository): Response
    {
        return $this->render('type_biere/index.html.twig', ['type_bieres' => $typeBiereRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_biere_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeBiere = new TypeBiere();
        $form = $this->createForm(TypeBiereType::class, $typeBiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeBiere);
            $em->flush();

            return $this->redirectToRoute('type_biere_index');
        }

        return $this->render('type_biere/new.html.twig', [
            'type_biere' => $typeBiere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTypeBiere}", name="type_biere_show", methods="GET")
     */
    public function show(TypeBiere $typeBiere): Response
    {
        return $this->render('type_biere/show.html.twig', ['type_biere' => $typeBiere]);
    }

    /**
     * @Route("/{idTypeBiere}/edit", name="type_biere_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeBiere $typeBiere): Response
    {
        $form = $this->createForm(TypeBiereType::class, $typeBiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_biere_edit', ['id_type_biere' => $typeBiere->getId_type_biere()]);
        }

        return $this->render('type_biere/edit.html.twig', [
            'type_biere' => $typeBiere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTypeBiere}", name="type_biere_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeBiere $typeBiere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeBiere->getId_type_biere(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeBiere);
            $em->flush();
        }

        return $this->redirectToRoute('type_biere_index');
    }
}
