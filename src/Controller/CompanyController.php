<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\Type\CompanyType;
use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

class CompanyController extends AbstractController
{
  
    #[Route('/companies/new', name: 'company')]
    public function newCompany(Request $request,CompanyRepository $companyRepository): Response
    {
        // creates a company object and initializes some data for this example
        $company = new Company();
    
        $form = $this->createForm(CompanyType::class, $company);

        $form->handleRequest($request);
        if ($form->isSubmitted( )&&$form->isValid()){
        $companyRepository->save($company, true);

        }

        return $this->renderForm('company/company.html.twig', [
            'form' => $form,
        ]);
    }
}