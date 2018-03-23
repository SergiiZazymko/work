<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FindVacancyController extends Controller
{
    /**
     * @Route("/find/vacancy", name="find_vacancy")
     */
    public function index()
    {
        return $this->render('find_vacancy/index.html.twig', [
            'controller_name' => 'FindVacancyController',
        ]);
    }
}
