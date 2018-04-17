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
use Symfony\Component\Security\Core\User\UserInterface;

class RegistrationController extends Controller
{
    const SUCCESS_REGISTER_MESSAGE = 'Thank you for registration. Email with confirmation link was sent to your mailbox';
    const EMAIL_CONFIRM_MESSAGE = 'Thank you! Your email was successfully confirmed. Now you can login';
    const NOT_VALID_TOKEN_MESSAGE = 'This token is not valid';

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

//            $email = $user->getEmail();
//
//            if ($userRepository->findOneByEmail($email)) {
//                $this->addFlash('danger', "Email $email already exists");
//                return $this->redirectToRoute('registration');
//            }

            if ($session->get('userType') == 'worker') {
                $role = $roleRepository -> findOneByName('ROLE_WORKER');
            } elseif ($session->get('userType') == 'employer') {
                $role = $roleRepository -> findOneByName('ROLE_EMPLOYER');
            }

            $user->setRoles($role);
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPlainPassword()));
            $token = bin2hex(openssl_random_pseudo_bytes(10));
            $user->setToken($token);

            try {
                $entityManager->persist($user);
                $entityManager->flush();
            } catch (UniqueConstraintViolationException $e) {
                $email = $user->getEmail();
                $this->addFlash('danger', "Email $email already exists");
                return $this->redirectToRoute('registration');
            }

            $this->addFlash('success', self::SUCCESS_REGISTER_MESSAGE);

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

    /**
     * @Route("/confirmation", name="confirmation")
     */
    public function confirmation(
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        Request $reauest
    )
    {
        $tokenFormQuery = $reauest->query->get('token');
        $user = $userRepository->findOneByToken($tokenFormQuery);

        if (!$user) {
            throw $this->createNotFoundException(self::NOT_VALID_TOKEN_MESSAGE);
        }

        $user->setStatus(1);
        $entityManager->persist($user);
        $entityManager->flush();
        $this->addFlash('success', self::EMAIL_CONFIRM_MESSAGE);
        return $this->redirectToRoute('login');
    }
}
