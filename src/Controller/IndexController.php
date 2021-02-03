<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HelloWorldController
 * @package App\Controller
 * @Route("/")
 */
class HelloWorldController
{
    /**
     * @return Response
     * @Route("/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf('hello %s', $slug));
    }
}