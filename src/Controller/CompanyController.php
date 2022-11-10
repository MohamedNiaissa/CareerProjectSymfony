<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\User;
use App\Form\Type\CompanyType;
use App\Repository\CompanyRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("IS_AUTHENTICATED_REMEMBERED", statusCode: 404, message: "Requested ressource not found")]
class CompanyController extends AbstractController
{
	#[Route('/companies/new', name: 'app_company')]
	public function newCompany(Request $request, CompanyRepository $companyRepository, UserRepository $userRepository): Response
	{
		/** @var \App\Entity\User $user */
		$user = $this->getUser();

		// creates a company object and initializes some data for this example
		$company = new Company($user);

		$form = $this->createForm(CompanyType::class, $company);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$companyRepository->save($company, true);
			$user->setCompany($company);
			$userRepository->save($user, true);
		}

		$allCompanies = $companyRepository->findAll();

		return $this->renderForm('company/company.html.twig', [
			'form' => $form,
			'companies' => $allCompanies
		]);
	}
}