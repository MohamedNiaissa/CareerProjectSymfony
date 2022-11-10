<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\Type\CompanyEditType;
use App\Form\Type\CompanyType;
use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class CompanyController extends AbstractController
{


    #[Route('/companies/new', name: 'company')]
    public function newCompany(Request $request, CompanyRepository $companyRepository): Response
    {

        // creates a company object and initializes some data for this example
        $company = new Company();

        $form = $this->createForm(CompanyType::class, $company);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $companyRepository->save($company, true);
        }
        $allCompanies = $companyRepository->findAll();

        return $this->renderForm('company/company.html.twig', [
            'form' => $form,
            'companies' => $allCompanies
        ]);
    }

    #[Route('/companies/edit/{id}', name: 'company_edit')]
    public function editCompany(Request $request, CompanyRepository $companyRepository, ManagerRegistry $doctrine, int $id): Response
    {

        $company = new Company();

        $form = $this->createForm(CompanyEditType::class, $company);

        $companyFound = $companyRepository->find($id);

        if (!$companyFound) {
            throw $this->createNotFoundException(
                'No company found for id ' . $id
            );
        }
        $entityManager = $doctrine->getManager();

        $datas =  $form->getData();
        $companyFound->setName('New company name!');
        $entityManager->flush();

        //$form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        }
            var_dump($datas);
        //$allCompanies = $companyRepository->findAll();

        return $this->renderForm('company/companyEdit.html.twig', [
            'form' => $form,
           // 'companies' => $allCompanies

        ]);

    }


}