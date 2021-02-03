<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HelloWorldController
 * @package App\Controller
 * @Route("/")
 */
class IndexController extends AbstractController
{
    /**
     * @return Response
     * @Route("/hej")
     */
    public function show()
    {
        return $this->render('info/index.html.twig');
    }
}