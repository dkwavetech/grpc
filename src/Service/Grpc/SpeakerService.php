<?php

namespace App\Service\Grpc;

use App\Service\Grpc\Exception\SpeakerNotFoundException;
use Infra\Conference\ConferenceInterface;
use App\Entity\Speaker;
use Doctrine\ORM\EntityManagerInterface;
use Infra\Conference\SpeakerReply;
use Infra\Conference\SpeakerRequest;

class SpeakerService implements ConferenceInterface
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritDoc}
     * @throws SpeakerNotFoundException
     */
    public function getSpeaker(SpeakerRequest $request): SpeakerReply
    {
        $speakerId = (int) $request->getId();

        /** @var Speaker $speakerEntity */
        $speakerEntity = $this->entityManager->getRepository(Speaker::class)->find($speakerId);

        if (null === $speakerEntity) {
            throw new SpeakerNotFoundException();
        }

        $reply = new SpeakerReply();

        return $reply
            ->setId($speakerEntity->getId())
            ->setName($speakerEntity->getName())
            ->setTalk($speakerEntity->getTalk());
    }
}
