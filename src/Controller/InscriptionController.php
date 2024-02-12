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
use function PHPUnit\Framework\returnArgument;
use Symfony\Component\Form\FormTypeInterface;

class InscriptionController extends AbstractController{



    #[Route('/accueil', name: 'budget_accueil')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $profile = new Profile();
        $form = $this->createForm(AccueilFormType::class, $profile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($profile);
            $entityManager->flush();
            $formData = $form->getData();


            $profileType = $formData->getProfileType();

            switch ($profileType) {
                case 'Student':
                    return $this->redirectToRoute('budget_student');
                case 'Traveler':
                    return $this->redirectToRoute('budget_traveler');
                case 'Investor':
                    return $this->redirectToRoute('budget_investor');
                case 'Parent':
                    return $this->redirectToRoute('budget_parent');
                case 'Couple':
                    return $this->redirectToRoute('budget_couple');
                default:
                    return $this->redirectToRoute('budget_accueil');
            }




        }
        return $this->render('inscription/accueil.html.twig', [
            'controller_name' => 'InscriptionController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/student', name: 'budget_student')]
    public function student(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('Profile/student.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/traveler', name: 'budget_traveler')]
    public function traveler(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('Profile/traveler.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/investor', name: 'budget_investor')]
    public function investor(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('Profile/investor.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/parent', name: 'budget_parent')]
    public function parent(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('Profile/parent.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/couple', name: 'budget_couple')]
    public function couple(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('Profile/couple.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }



}