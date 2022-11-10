<?php

namespace App\Service;

use App\Repository\JobRepository;
use Doctrine\ORM\Query;

class JobManager
{
	private $jr;

	public function __construct(JobRepository $jobRepository)
	{
		$this->jr = $jobRepository;
	}

	public function retrieveUnmatched() {
		$queryBuilder = $this->jr->createQueryBuilder('t');
		$queryBuilder
			->select('partial t.{id, title, description}')
			->where("t.status LIKE 'unmatched'")
			->orderBy('t.id', 'ASC');

		return $queryBuilder->getQuery()->getResult(Query::HYDRATE_ARRAY);
	}

	public function retrievePending() {
		$queryBuilder = $this->jr->createQueryBuilder('t');
		$queryBuilder
			->select('partial t.{id, title, description}')
			->where("t.status LIKE 'pending'")
			->orderBy('t.id', 'ASC');

		return $queryBuilder->getQuery()->getResult(Query::HYDRATE_ARRAY);
	}
}