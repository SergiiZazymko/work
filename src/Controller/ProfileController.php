<?php

namespace App\Controller;

use App\Repository\ResumeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index(UserInterface $user, ResumeRepository $resumeRepository)
    {
        $resumes = $resumeRepository->findByUser($user);

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'resumes' => $resumes,
        ]);
    }
}
