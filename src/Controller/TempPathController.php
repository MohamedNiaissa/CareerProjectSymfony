<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TempPathController extends AbstractController
{


    //Companies

    #[Route('/companies', name: 'allcompanies')]
    public function goToCompaniesMain(): Response
    {
        return $this->render('company/company.html.twig');
    }
    #[Route('/companies/edit', name: 'companiesedit')]
    public function goToCompaniesEdit(): Response
    {
        return $this->render('company/companyedit.html.twig');
    }


    //Candidates

    #[Route('/candidates', name: 'allcandidates')]
    public function goToCandidatesMain(): Response
    {
        return $this->render('candidates/candidates.html.twig');
    }
    #[Route('/candidates/new', name: 'candidatesnew')]
    public function goToCandidatesNew(): Response
    {
        return $this->render('candidates/candidatesnew.html.twig');
    }
    #[Route('/candidates/edit', name: 'candidatesedit')]
    public function goToCandidatesEdit(): Response
    {
        return $this->render('candidates/candidatesedit.html.twig');
    }


    //Jobs

    #[Route('/jobs', name: 'jobsmain')]
    public function goToJobsMain(): Response
    {
        $allJobs[] = [
            "title" => "Charpentier",
            "company" => "La Maif",
            "location" => "Here",
            "status" => "En cours",
            "date" => "01/01/1001"
        ];

        return $this->render('jobs/jobs.html.twig', [
            'allJobs' => $allJobs,
        ]);
    }
    #[Route('/jobs/new', name: 'jobsnew')]
    public function goToJobsNew(): Response
    {
        return $this->render('jobs/jobsnew.html.twig');
    }
    #[Route('/jobs/edit', name: 'jobsedit')]
    public function goToJobsEdit(): Response
    {
        return $this->render('jobs/jobsedit.html.twig');
    }
}
