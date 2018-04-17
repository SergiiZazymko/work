<?php

namespace App\Controller;

use App\Form\CitiesType;
use App\Repository\ResumeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FindResumeController extends Controller
{
    /**
     * @Route("/find/resume", name="find_resume")
     */
    public function index(ResumeRepository $resumeRepository, Request $request)
    {
        $resumes = $resumeRepository->findAll();
        $form = $this->createForm(CitiesType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $city = $form->getData()->getName();
        } else {
            $city = null;
        }

        return $this->render('find_resume/index.html.twig', [
            'resumes' => $resumes,
            'form' => $form->createView(),
            'city' => $city,
        ]);
    }
}
