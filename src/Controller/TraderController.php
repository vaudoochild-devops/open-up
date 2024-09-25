<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TraderController extends AbstractController
{
    /**
     * @Route("/trader", name="trader")
     */
    public function index()
    {
        return $this->render('trader/index.html.twig', [
            'controller_name' => 'TraderController',
        ]);
    }
}
