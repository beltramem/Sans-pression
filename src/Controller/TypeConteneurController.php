<?php

namespace App\Controller;

use App\Entity\TypeConteneur;
use App\Form\TypeConteneurType;
use App\Repository\TypeConteneurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/conteneur")
 */
class TypeConteneurController extends Controller
{
    /**
     * @Route("/", name="type_conteneur_index", methods="GET")
     */
    public function index(TypeConteneurRepository $typeConteneurRepository): Response
    {
        return $this->render('type_conteneur/index.html.twig', ['type_conteneurs' => $typeConteneurRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_conteneur_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeConteneur = new TypeConteneur();
        $form = $this->createForm(TypeConteneurType::class, $typeConteneur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeConteneur);
            $em->flush();

            return $this->redirectToRoute('type_conteneur_index');
        }

        return $this->render('type_conteneur/new.html.twig', [
            'type_conteneur' => $typeConteneur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id_type_conteneur}", name="type_conteneur_show", methods="GET")
     */
    public function show(TypeConteneur $typeConteneur): Response
    {
        return $this->render('type_conteneur/show.html.twig', ['type_conteneur' => $typeConteneur]);
    }

    /**
     * @Route("/{id_type_conteneur}/edit", name="type_conteneur_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeConteneur $typeConteneur): Response
    {
        $form = $this->createForm(TypeConteneurType::class, $typeConteneur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_conteneur_edit', ['id_type_conteneur' => $typeConteneur->getId_type_conteneur()]);
        }

        return $this->render('type_conteneur/edit.html.twig', [
            'type_conteneur' => $typeConteneur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id_type_conteneur}", name="type_conteneur_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeConteneur $typeConteneur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeConteneur->getId_type_conteneur(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeConteneur);
            $em->flush();
        }

        return $this->redirectToRoute('type_conteneur_index');
    }
}
