<?php

namespace App\Controller;

use App\Service\Grpc\Server\SpeakerServerService;
use Infra\Conference\SpeakerRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetGrpcSpeakerController
{
    /** @var SpeakerServerService */
    private $speakerServerService;

    public function __construct(SpeakerServerService $speakerServerService)
    {
        $this->speakerServerService = $speakerServerService;
    }

    /**
     * @Route("/getSpeaker", name="app_get_grpc_speaker")
     */
    public function __invoke(): Response
    {
        $request = new SpeakerRequest();

        $request->mergeFromString(file_get_contents('php://input'));

        $reply = $this->speakerServerService->getSpeaker($request);

        return new Response($reply->serializeToString());
    }
}
