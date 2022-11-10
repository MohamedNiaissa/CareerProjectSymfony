<?php
namespace App\Command;

use App\Service\JobManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'app:jobs')]
class CreateJobsCommand extends Command
{
	private $jobsManager;

	public function __construct(JobManager $jobsManager = null)
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

		$output->writeln('');
		$output->writeln(['Generating list of ' . $param . ' jobs :']);
		$output->writeln('');

		if($param === "unmatched") {
			$unmatched = $this->jobsManager->retrieveUnmatched();

			if((count($unmatched)) >= 1) {
				$output->writeln('-------------------');
				for($x = 0; $x <= count($unmatched) - 1; $x++) {
					$output->writeln($unmatched[$x]);
					$output->writeln('-------------------');
				}
			} else {
				$output->writeln('NO DATA FOUND');
			}
		} else {
			$pending = $this->jobsManager->retrievePending();

			if((count($pending)) >= 1) {
				$output->writeln('-------------------');
				for($x = 0; $x <= count($pending) - 1; $x++) {
					$output->writeln($pending[$x]);
					$output->writeln('-------------------');
				}
			} else {
				$output->writeln('NO DATA FOUND');
			}
		}
		
		return Command::SUCCESS;
	}
}