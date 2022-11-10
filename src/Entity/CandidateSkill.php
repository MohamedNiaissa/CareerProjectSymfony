<?php

namespace App\Entity;

use App\Repository\CandidateSkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidateSkillRepository::class)]
class CandidateSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'candidateSkills')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidate $candidate_id = null;

    #[ORM\ManyToOne(inversedBy: 'candidateSkills')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Skill $skill_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCandidateId(): ?Candidate
    {
        return $this->candidate_id;
    }

    public function setCandidateId(?Candidate $candidate_id): self
    {
        $this->candidate_id = $candidate_id;

        return $this;
    }

    public function getSkillId(): ?Skill
    {
        return $this->skill_id;
    }

    public function setSkillId(?Skill $skill_id): self
    {
        $this->skill_id = $skill_id;

        return $this;
    }
}
