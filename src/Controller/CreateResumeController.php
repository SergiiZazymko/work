<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreateResumeController extends Controller
{
    /**
     * @Route("/create/resume", name="create_resume")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('ROLE_WORKER', null, 'No access');

        return $this->render('create_resume/index.html.twig', [
            'controller_name' => 'CreateResumeController',
        ]);
    }
}
