<?php

namespace App\Controller;

use App\Entity\Resume;
use App\Form\ResumeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EditResumeController extends Controller
{
    /**
     * @Route("/edit/resume/{id}", name="edit_resume")
     */
    public function index(Resume $resume, Request $request, EntityManagerInterface $em)
    {

        $form = $this->createForm(ResumeType::class, $resume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($resume);
            $em->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('edit_resume/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
