<?php

namespace App\Controller;

use App\Entity\CategorieVieillissement;
use App\Form\CategorieVieillissementType;
use App\Repository\CategorieVieillissementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorie/vieillissement")
 */
class CategorieVieillissementController extends Controller
{
    /**
     * @Route("/", name="categorie_vieillissement_index", methods="GET")
     */
    public function index(CategorieVieillissementRepository $categorieVieillissementRepository): Response
    {
        return $this->render('categorie_vieillissement/index.html.twig', ['categorie_vieillissements' => $categorieVieillissementRepository->findAll()]);
    }

    /**
     * @Route("/new", name="categorie_vieillissement_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $categorieVieillissement = new CategorieVieillissement();
        $form = $this->createForm(CategorieVieillissementType::class, $categorieVieillissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieVieillissement);
            $em->flush();

            return $this->redirectToRoute('categorie_vieillissement_index');
        }

        return $this->render('categorie_vieillissement/new.html.twig', [
            'categorie_vieillissement' => $categorieVieillissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCategorieVieillissement}", name="categorie_vieillissement_show", methods="GET")
     */
    public function show(CategorieVieillissement $categorieVieillissement): Response
    {
        return $this->render('categorie_vieillissement/show.html.twig', ['categorie_vieillissement' => $categorieVieillissement]);
    }

    /**
     * @Route("/{idCategorieVieillissement}/edit", name="categorie_vieillissement_edit", methods="GET|POST")
     */
    public function edit(Request $request, CategorieVieillissement $categorieVieillissement): Response
    {
        $form = $this->createForm(CategorieVieillissementType::class, $categorieVieillissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorie_vieillissement_edit', ['idCategorieVieillissement' => $categorieVieillissement->getIdCategorieVieillissement()]);
        }

        return $this->render('categorie_vieillissement/edit.html.twig', [
            'categorie_vieillissement' => $categorieVieillissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCategorieVieillissement}", name="categorie_vieillissement_delete", methods="DELETE")
     */
    public function delete(Request $request, CategorieVieillissement $categorieVieillissement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieVieillissement->getIdCategorieVieillissement(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorieVieillissement);
            $em->flush();
        }

        return $this->redirectToRoute('categorie_vieillissement_index');
    }
}
