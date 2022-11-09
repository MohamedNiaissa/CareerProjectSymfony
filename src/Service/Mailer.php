<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
// use Symfony\Component\Mime\NamedAddress;

class Mailer
{
	private $mailer;

	public function __construct(MailerInterface $mailer)
	{
		$this->mailer = $mailer;
	}

	//! Pass the candidate entity
	public function sendAcceptedOffer(/* Candidate $candidate */)
	{	
		$email = (new TemplatedEmail())
			->from('example@example.com', 'Website name')
			// ->to($candidate->getEmail(), $candidate->getName())
			->subject("Welcome to the Website name!")
			// ->htmlTemplate('email/welcome.html.twig')
			->text("Lorem ipsum test message");

		$this->mailer->send($email);
	}
}