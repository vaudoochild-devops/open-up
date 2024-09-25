<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GratificationController extends AbstractController
{
    /**
     * @Route("/gratification", name="gratification")
     */
    public function index()
    {
        return $this->render('gratification/index.html.twig', [
            'controller_name' => 'GratificationController',
        ]);
    }
}
