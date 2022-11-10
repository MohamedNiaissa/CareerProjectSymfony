<?php

namespace App\Entity;

use App\Repository\SkillJobRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillJobRepository::class)]
class SkillJob
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'skillJobs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Job $job_id = null;

    #[ORM\ManyToOne(inversedBy: 'skillJobs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Skill $skill_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobId(): ?Job
    {
        return $this->job_id;
    }

    public function setJobId(?Job $job_id): self
    {
        $this->job_id = $job_id;

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
