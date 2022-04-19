<?php

namespace App\Command;

use App\Repository\ContactRepository; 
use App\Repository\AdministratorRepository;
use App\Service\ContactService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SendContactCommand extends Command
{
    private $contacRepository;
    private $mailer;
    private $contactService;
    private $administratorRepository;
    protected static $defaultName = 'app:send-contact';

    public function __construct(
        ContactRepository $contacRepository,
        MailerInterface $mailer,
        ContactService $contactService,
        AdministratorRepository $administratorRepository
    ) {
        $this->contactRepository = $contacRepository;
        $this->mailer = $mailer;
        $this->contactService = $contactService;
        $this->administratorRepository = $administratorRepository;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $toSend = $this->contactRepository->findBy(['is_send' => false]);

        // Fonction à écrire pour récupération du mail, du Prénom et du Nom de l'admin

        //$adress = new Address($this->administratorRepository->getEmail(), $this->administratorRepository->getFirstName() . ' ' . $this->administratorRepository->getLastName());

        foreach ($toSend as $mail) {
            $email = (new Email())
                ->from($mail->getEmail())
                ->to('theo.pichon.musique@gmail.com')
                ->subject('Nouveau message de Théo')
                ->text($mail->getMessage());

                $this->mailer->send($email);

                $this->contactService->IsSend($mail);
        }

        return Command::SUCCESS;
    }
}