<?php


namespace App\Controller;

use App\Entity\Profile;
use App\Entity\User;
use App\Form\AccueilFormType;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use function PHPUnit\Framework\returnArgument;
use Symfony\Component\Form\FormTypeInterface;

class UserController extends AbstractController
{
    #[Route('/useraccount', name: 'budget_useraccount')]
    public function useraccount(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            $user = $this->getUser();
            // Récupérer tous les profils associés à l'utilisateur
            $profiles = $user->getProfiles();
            return $this->render('user/useraccount.html.twig', [
                'controller_name' => 'UserController',
                'user' => $user,
            ]);
        }
        return $this->redirectToRoute('home');

    }
    #[Route('/useraccount/deleteUser', name: 'budget_delete_user')]
    public function deleteUserAndProfiles(Request $request, TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager): Response
    {
        $entityManager->getFilters()->enable('softdeleteable');
        $user = $this->getUser();

        if ($user) {
            $user->setEmailValid(null);
            $entityManager->flush();
            $entityManager->remove($user);
            for ($i = 0; $i < count($user->getProfiles()); $i++) {
                $profile = $user->getProfiles()[$i];
                $entityManager->remove($profile);

            }

            $entityManager->flush();
            $request->getSession()->invalidate();
            $tokenStorage->setToken(null);

            return $this->redirectToRoute('home');
        }

        return $this->redirectToRoute('home');
    }
}