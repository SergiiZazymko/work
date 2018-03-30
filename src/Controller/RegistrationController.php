<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder,
        EntityManagerInterface $entityManager,
        SessionInterface $session,
        RoleRepository $roleRepository
    )
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $email = $user->getEmail();

//            if ($userRepository->findOneByEmail($email)) {
//                $this->addFlash('danger', "Email $email already exists");
//                return $this->redirectToRoute('registration');
//                die;
//            }

            if ($session->get('userType') == 'worker') {
                $role = $roleRepository -> findOneByName('ROLE_WORKER');
            } elseif ($session->get('userType') == 'employer') {
                $role = $roleRepository -> findOneByName('ROLE_EMPLOYER');
            }

            $user->setRoles($role);
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPlainPassword()));

            try {
                $entityManager->persist($user);
                $entityManager->flush();
            } catch (UniqueConstraintViolationException $e) {
                $this->addFlash('danger', "Email $email already exists");
                return $this->redirectToRoute('registration');
            }

            $this->addFlash('success', 'Thank you for registration');

            if ($session->get('userType') == 'worker') {
                return $this->redirectToRoute('home');
            } elseif ($session->get('userType') == 'employer') {
                return $this->redirectToRoute('home_employer');
            }
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
