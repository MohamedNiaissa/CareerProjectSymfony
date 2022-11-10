<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{

	#[ORM\Id]
                            #[ORM\GeneratedValue]
                            #[ORM\Column]
                            private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'jobs', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Company $company = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 2000)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'job_id', targetEntity: SkillJob::class)]
    private Collection $skillJobs;

    public function __construct()
    {
        $this->skillJobs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, SkillJob>
     */
    public function getSkillJobs(): Collection
    {
        return $this->skillJobs;
    }

    public function addSkillJob(SkillJob $skillJob): self
    {
        if (!$this->skillJobs->contains($skillJob)) {
            $this->skillJobs->add($skillJob);
            $skillJob->setJobId($this);
        }

        return $this;
    }

    public function removeSkillJob(SkillJob $skillJob): self
    {
        if ($this->skillJobs->removeElement($skillJob)) {
            // set the owning side to null (unless already changed)
            if ($skillJob->getJobId() === $this) {
                $skillJob->setJobId(null);
            }
        }

        return $this;
    }
}
