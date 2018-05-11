<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("gestion/")
 */
class GestionController extends Controller
{
	/**
     * @Route("/", name="gestion_index", methods="GET")
     */
	public function index(): Response
    {
        return $this->render('gestion/index.html.twig');
    }
}