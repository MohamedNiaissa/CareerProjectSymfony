<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\Type\JobType;
use App\Repository\JobRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("IS_AUTHENTICATED_REMEMBERED", statusCode: 404, message: "Requested ressource not found")]
class JobController extends AbstractController
{
	#[Route('/jobs', name: 'app_jobs_list', methods: 'GET')]
	public function getJobsList(JobRepository $jobRepository): Response
	{
		$allJobs = $jobRepository->findAll();

		return $this->render('job/index.html.twig', [
			'controller_name' => 'JobController',
			'jobs' => $allJobs,
		]);
	}

	#[Route('/jobs/new', name: 'new_job', methods: 'GET')]
	public function createOneJob(Request $request, JobRepository $jobRepository): Response
	{
		$job = new Job();
		$form = $this->createForm(JobType::class, $job);

		$form->handleRequest($request);
		if ($form->isSubmitted( ) && $form->isValid()) {
			// $jobRepository->save($job, true);
		}

		return $this->renderForm('job/job.html.twig', [
			'form' => $form,
		]);
	}
}
