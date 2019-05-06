<?php

namespace App\Command;

use App\Repository\UserProfileRepository;
use App\Utils\UserProfileValidator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Stopwatch\Stopwatch;

class AddUserCommand extends Command
{
    protected static $defaultName = 'app:addUser';

    private $entityManager;
    private $passwordEncoder;
    private $validator;
    private $users;

    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $encoder,UserProfileValidator $validator, UserProfileRepository $users)
    {
        parent::__construct();

        $this->entityManager = $em;
        $this->passwordEncoder = $encoder;
        $this->validator = $validator;
        $this->users = $users;
    }

    protected function configure()
    {
        $this
            ->setDescription('Creates users and stores them in the database')
            ->addArgument('username', InputOption::VALUE_REQUIRED, 'Username For Login')
            ->addArgument('full-name', InputOption::VALUE_REQUIRED, 'Username for Hello Message')
            ->addArgument('age', InputArgument::OPTIONAL, 'For Classification Purposes')
            ->addArgument('password', InputOption::VALUE_REQUIRED, 'The Raw Password, Pre-Encode')
            ->addArgument('email', InputOption::VALUE_REQUIRED, 'The email of the new user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $usr = array();

        $usr['username'] = $input->getArgument('username');
        $usr['full_name'] = $input->getArgument('full-name');
        $usr['age'] = $input->getArgument('age');
        $usr['password'] = $input->getArgument('password');
        $usr['email'] = $input->getArgument('email');
        $usr['creationDate'] = 'Now';

        $val = $this->validator->validateUserProfile($usr);
        if ($val === 0){
            $io->success("User is Validated");
        } else {
            $io->success("$val error");
        }


    }
}
