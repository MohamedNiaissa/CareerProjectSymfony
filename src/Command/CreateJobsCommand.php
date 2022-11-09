<?php
namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'app:jobs')]
class CreateJobsCommand extends Command
{
	private $jobsManager;

	// Remove 'object' and '= null' once the jobs service is created
	public function __construct(/* SERVICE */ object $jobsManager = null)
	{
		$this->jobsManager = $jobsManager;
		parent::__construct();
	}

	protected function configure(): void
	{
		$this->setDescription('This command show the current list of unmatched jobs')
				->addArgument('param', InputArgument::REQUIRED, 'Pass the parameter.');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$param = $input->getArgument('param');

		if($param !== "unmatched" && $param !== "pending")
		{
			$output->writeln([
				'WARNING : "' . $param . '" is not a supported parameter',
				'',
				'Supported parameters are :',
				'',
				'- unmatched',
				'- pending',
			]);
			return Command::INVALID;
		}

		$output->writeln(['Generating list of ' . $param . ' jobs :', '***********************************']);

		if($param === "unmatched") {
			//! Uncomment once created
			// $unmatched = $this->jobsManager->retrieveUnmatched();

			for($x = 0; $x <= 1 /* count($unmatched) */; $x++) {
				$output->writeln("item, format, status..");
			}
		} else {
			//! Uncomment once created
			// $pending = $this->jobsManager->retrievePending();

			for($x = 0; $x <= 1 /* count($pending) */; $x++) {
				$output->writeln("item, format, status..");
			}
		}
		
		return Command::SUCCESS;
	}
}