<?php

namespace App\Controller;

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("search")
 */
class SearchController extends Controller
{
	/**
     * @Route("/", name="app_search")
     * @Template("pages/search.html.twig")
     */
    public function searchAction()
    {
        return ["project_name" => "yourProject"];
    }
}