<?php

namespace App\Controller;

use App\Service\Grpc\SpeakerService;
use Infra\Conference\getRequest;
use Infra\Conference\SpeakerRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetSpeakerController
{
    /** @var SpeakerService */
    private $speakerService;

    public function __construct(SpeakerService $speakerService)
    {
        $this->speakerService = $speakerService;
    }

    /**
     * @Route("/getSpeaker", name="app_get_speaker")
     */
    public function __invoke(): Response
    {
        $request = new SpeakerRequest();
        $request->mergeFromString(file_get_contents('php://input'));
        $reply = $this->speakerService->getSpeaker($request);

        return new Response($reply->serializeToString());
    }
}
