<?php

namespace App\Controller;

use App\Entity\Resume;
use App\Form\ResumeType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreateResumeController extends Controller
{
    /**
     * @Route("/create/resume", name="create_resume")
     * @Security("has_role('ROLE_WORKER')")
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        //$this->denyAccessUnlessGranted('ROLE_WORKER', null, 'No access');

        $resume = new Resume();
        $form = $this->createForm(ResumeType::class, $resume);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($form);
            $em->flush();

            return $this->redirectToRoute('profile');
        }


        return $this->render('create_resume/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
