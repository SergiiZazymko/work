<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreateVacancyController extends Controller
{
    /**
     * @Route("/create/vacancy", name="create_vacancy")
     */
    public function index()
    {
        return $this->render('create_vacancy/index.html.twig', [
            'controller_name' => 'CreateVacancyController',
        ]);
    }
}
