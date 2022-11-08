<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
#[Table(name: 'skills')]
class Skill
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private ?int $idskill = null;

	#[ORM\Column(length: 255)]
	private ?string $name = null;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getIdskill(): ?int
	{
		return $this->idskill;
	}

	public function setIdskill(int $idskill): self
	{
		$this->idskill = $idskill;

		return $this;
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
}
