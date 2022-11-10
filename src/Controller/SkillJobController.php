<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\SkillJob;
use App\Form\Type\JobType;
use App\Form\Type\SkillJobType;
use App\Repository\JobRepository;
use App\Repository\SkillJobRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("IS_AUTHENTICATED_REMEMBERED", statusCode: 404, message: "Requested ressource not found")]
class SkillJobController extends AbstractController
{


    #[Route('/skill/new', name: 'new_job_skill')]
    public function addSkills(Request $request, SkillJobRepository $skillJobRepository): Response
    {
        $skillJob = new SkillJob();
        $form = $this->createForm(SkillJobType::class, $skillJob);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $skillJobRepository->save($skillJob, true);

        }
        return $this->renderForm('job/job.html.twig', [
            'form' => $form
        ]);
    }
}