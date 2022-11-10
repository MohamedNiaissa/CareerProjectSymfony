<?php

namespace App\Form\Type;

use App\Entity\Candidate;
use App\Entity\Skill;
use App\Repository\SkillRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidateType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
			->add('name')
			->add('age')
			->add('picture')
			->add('email')
			->add('skills', EntityType::class, [
				'mapped' => false,
				'class' => Skill::class,
				'query_builder' => function (SkillRepository $sr) {
					$queryBuilder = $sr->createQueryBuilder('t');
					$queryBuilder
						->select('partial t.{id, name}')
						->orderBy('t.name', 'ASC');
		
					return $queryBuilder;
				},
			])
		;
	}

	public function configureOptions(OptionsResolver $resolver): void
	{
		$resolver->setDefaults([
			'data_class' => Candidate::class,
		]);
	}
}
