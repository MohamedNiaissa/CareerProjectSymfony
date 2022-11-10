<?php

namespace App\Controller;

use App\Entity\CandidateSkill;
use App\Entity\Job;
use App\Entity\SkillJob;
use App\Form\Type\CandidateSkillType;
use App\Form\Type\SkillJobType;
use App\Repository\CandidateSkillRepository;
use App\Repository\SkillJobRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("IS_AUTHENTICATED_REMEMBERED", statusCode: 404, message: "Requested ressource not found")]
class CandidateSkillController extends AbstractController
{


    #[Route('/skill/candidate/new', name: 'new_candidate_skill')]
    public function addSkillsForCandidat(Request $request, CandidateSkillRepository $candidateSkillRepository): Response
    {
        $candidateSkill = new CandidateSkill();
        $form = $this->createForm(CandidateSkillType::class, $candidateSkill);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidateSkillRepository->save($candidateSkill, true);
        }
        return $this->renderForm('job/job.html.twig', [
            'form' => $form
        ]);
    }
}