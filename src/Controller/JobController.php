<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

	#[Route('/jobs/{id}', name: 'one_job', methods: 'GET')]
	public function getOneJob(string $id = null): Response
	{
		return $this->render('job/index.html.twig', [
			'controller_name' => 'JobController',
		]);
	}
}
