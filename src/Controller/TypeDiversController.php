<?php

namespace App\Controller;

use App\Entity\TypeDivers;
use App\Form\TypeDiversType;
use App\Repository\TypeDiversRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/divers")
 */
class TypeDiversController extends Controller
{
    /**
     * @Route("/", name="type_divers_index", methods="GET")
     */
    public function index(TypeDiversRepository $typeDiversRepository): Response
    {
        return $this->render('type_divers/index.html.twig', ['type_divers' => $typeDiversRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_divers_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeDiver = new TypeDivers();
        $form = $this->createForm(TypeDiversType::class, $typeDiver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeDiver);
            $em->flush();

            return $this->redirectToRoute('type_divers_index');
        }

        return $this->render('type_divers/new.html.twig', [
            'type_diver' => $typeDiver,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTypeDivers}", name="type_divers_show", methods="GET")
     */
    public function show(TypeDivers $typeDiver): Response
    {
        return $this->render('type_divers/show.html.twig', ['type_diver' => $typeDiver]);
    }

    /**
     * @Route("/{idTypeDivers}/edit", name="type_divers_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeDivers $typeDiver): Response
    {
        $form = $this->createForm(TypeDiversType::class, $typeDiver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_divers_edit', ['idTypeDivers' => $typeDiver->getIdTypeDivers()]);
        }

        return $this->render('type_divers/edit.html.twig', [
            'type_diver' => $typeDiver,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTypeDivers}", name="type_divers_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeDivers $typeDiver): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeDiver->getIdTypeDivers(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeDiver);
            $em->flush();
        }

        return $this->redirectToRoute('type_divers_index');
    }
}
