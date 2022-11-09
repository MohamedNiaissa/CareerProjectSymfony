<?php

namespace App\Controller;

use App\Entity\Job;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
	#[Route('/jobs', name: 'list', methods: 'GET')]
	public function getJobsList(): Response
	{
		return $this->render('job/index.html.twig', [
			'controller_name' => 'JobController',
		]);
	}

	#[Route('/jobs/new', name: 'new_job', methods: 'POST')]
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

	#[Route('/jobs/{id}', name: 'one_job', methods: 'GET')]
	public function getOneJob(string $id = null): Response
	{
		return $this->render('job/index.html.twig', [
			'controller_name' => 'JobController',
		]);
	}
}
