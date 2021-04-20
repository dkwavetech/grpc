<?php

namespace App\Command;

use App\Service\Grpc\SpeakerClientService;
use Infra\Conference\SpeakerRequest;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SpeakerCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:grpc:get-speaker';

    /** @var SpeakerClientService */
    private $speakerClientService;

    public function __construct(SpeakerClientService $speakerClientService, string $name = null)
    {
        $this->speakerClientService = $speakerClientService;

        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            // configure an argument
            ->addArgument('speakerId', InputArgument::REQUIRED, 'The id of the speaker.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $speakerEntity = $this->speakerClientService->getSpeaker(new SpeakerRequest([
                'id' => $input->getArgument('speakerId')
            ]));

            $output->writeln("\n\n\n");
            $output->writeln(sprintf(
                "The speaker  %s will present the talk: %s !",
                $speakerEntity->getName(),
                $speakerEntity->getTalk())
            );
            $output->writeln("\n\n\n");

        } catch (\Exception $e) {
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}

