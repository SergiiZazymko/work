<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorkerController extends Controller
{
    /**
     * @Route("/worker", name="worker")
     */
    public function index()
    {
        return $this->render('worker/index.html.twig', [
            'controller_name' => 'WorkerController',
        ]);
    }
}
