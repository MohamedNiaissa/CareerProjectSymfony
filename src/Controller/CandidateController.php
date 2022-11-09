<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\Type\CandidateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidateController extends AbstractController
{
    #[Route('/candidate', name: 'app_candidate')]

    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $candidate = new Candidate();

        $form = $this->createForm(CandidateType::class, $candidate);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($candidate);
            $entityManager->flush();
        }

        return $this->render('Candidate/candidate.html.twig', [
            'controller_name' => 'CandidateController',
            'form' => $form->createView()
        ]);
    }
}
