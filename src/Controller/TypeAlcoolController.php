<?php

namespace App\Controller;

use App\Entity\TypeAlcool;
use App\Form\TypeAlcoolType;
use App\Repository\TypeAlcoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/alcool")
 */
class TypeAlcoolController extends Controller
{
    /**
     * @Route("/", name="type_alcool_index", methods="GET")
     */
    public function index(TypeAlcoolRepository $typeAlcoolRepository): Response
    {
        return $this->render('type_alcool/index.html.twig', ['type_alcools' => $typeAlcoolRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_alcool_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeAlcool = new TypeAlcool();
        $form = $this->createForm(TypeAlcoolType::class, $typeAlcool);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeAlcool);
            $em->flush();

            return $this->redirectToRoute('type_alcool_index');
        }

        return $this->render('type_alcool/new.html.twig', [
            'type_alcool' => $typeAlcool,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTypeAlcool}", name="type_alcool_show", methods="GET")
     */
    public function show(TypeAlcool $typeAlcool): Response
    {
        return $this->render('type_alcool/show.html.twig', ['type_alcool' => $typeAlcool]);
    }

    /**
     * @Route("/{idTypeAlcool}/edit", name="type_alcool_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeAlcool $typeAlcool): Response
    {
        $form = $this->createForm(TypeAlcoolType::class, $typeAlcool);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_alcool_edit', ['idTypeAlcool' => $typeAlcool->getIdTypeAlcool()]);
        }

        return $this->render('type_alcool/edit.html.twig', [
            'type_alcool' => $typeAlcool,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTypeAlcool}", name="type_alcool_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeAlcool $typeAlcool): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeAlcool->getIdTypeAlcool(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeAlcool);
            $em->flush();
        }

        return $this->redirectToRoute('type_alcool_index');
    }
}
