<?php

namespace App\Controller;

use App\Entity\Resume;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResumeController extends Controller
{
    /**
     * @Route("/resume/{id}", name="resume")
     */
    public function index(Resume $resume)
    {
        return $this->render('resume/index.html.twig', [
            'resume' => $resume,
        ]);
    }
}
