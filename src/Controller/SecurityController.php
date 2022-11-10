<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
	#[Route(path: '/login', name: 'app_login')]
	public function login(AuthenticationUtils $authenticationUtils): Response
	{
		if ($this->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
			throw $this->createAccessDeniedException('Requested ressource not found');
		}

		return $this->render('security/login.html.twig', [
			'error' => $authenticationUtils->getLastAuthenticationError(),
		]);
	}

	#[IsGranted("IS_AUTHENTICATED_REMEMBERED", statusCode: 404, message: "Requested ressource not found")]
	#[Route(path: '/logout', name: 'app_logout')]
	public function logout(): void
	{

		throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
	}
}
