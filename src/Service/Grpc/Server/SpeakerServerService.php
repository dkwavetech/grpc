<?php

namespace App\Service\Grpc\Server;

use App\Service\Grpc\Exception\SpeakerNotFoundException;
use Infra\Conference\ConferenceInterface;
use App\Entity\Speaker;
use Doctrine\ORM\EntityManagerInterface;
use Infra\Conference\SpeakerReply;
use Infra\Conference\SpeakerRequest;

class SpeakerServerService implements ConferenceInterface
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getSpeaker(SpeakerRequest $request)
    {
        /** @var Speaker $speakerEntity */
        $speakerEntity = $this->entityManager->getRepository(Speaker::class)->find($request->getId());

        if (null === $speakerEntity) {
            throw new SpeakerNotFoundException();
        }

        $speakerReply = new SpeakerReply();
        $speakerReply->setId($speakerEntity->getId());
        $speakerReply->setName($speakerEntity->getName());
        $speakerReply->setTalk($speakerEntity->getTalk());

        return $speakerReply;
    }
}
