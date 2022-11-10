<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
	#[ORM\Id]
                        	#[ORM\GeneratedValue]
                        	#[ORM\Column]
                        	private ?int $id = null;

	#[ORM\Column(length: 255)]
                        	private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'skill_id', targetEntity: SkillJob::class)]
    private Collection $skillJobs;

    public function __construct()
    {
        $this->skillJobs = new ArrayCollection();
    }

	public function getId(): ?int
                        	{
                        		return $this->id;
                        	}

	public function getName(): ?string
                        	{
                        		return $this->name;
                        	}

	public function setName(string $name): self
                        	{
                        		$this->name = $name;
                        
                        		return $this;
                        	}

	public function __toString()
                        	{
                        		return $this->name;
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
            $skillJob->setSkillId($this);
        }

        return $this;
    }

    public function removeSkillJob(SkillJob $skillJob): self
    {
        if ($this->skillJobs->removeElement($skillJob)) {
            // set the owning side to null (unless already changed)
            if ($skillJob->getSkillId() === $this) {
                $skillJob->setSkillId(null);
            }
        }

        return $this;
    }
}
