<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\Type\CandidateType;
use App\Repository\CandidateRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("IS_AUTHENTICATED_REMEMBERED", statusCode: 404, message: "Requested ressource not found")]
class CandidateController extends AbstractController
{
	#[Route('/candidates/new', name: 'app_candidate')]
	public function index(Request $request, CandidateRepository $candidateRepository, UserRepository $userRepository): Response
	{
		/** @var \App\Entity\User $user */
		$user = $this->getUser();

		$candidate = new Candidate($user);
		$form = $this->createForm(CandidateType::class, $candidate);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()){
			$candidateRepository->save($candidate, true);
			$user->setCandidate($candidate);
			$userRepository->save($user, true);
		}

		return $this->render('candidate/candidate.html.twig', [
			'controller_name' => 'CandidateController',
			'form' => $form->createView()
		]);
	}
}
