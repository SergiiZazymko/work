<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FindResumeController extends Controller
{
    /**
     * @Route("/find/resume", name="find_resume")
     */
    public function index()
    {
        return $this->render('find_resume/index.html.twig', [
            'controller_name' => 'FindResumeController',
        ]);
    }
}
