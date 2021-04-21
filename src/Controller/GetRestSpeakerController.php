<?php

namespace App\Controller;

use App\Entity\Speaker;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class GetRestSpeakerController
{
    /**
     * @Route("/getSpeaker/{speaker_id}", name="app_get_rest_speaker")
     * @ParamConverter("speaker", options={"id" = "speaker_id"})
     */
    public function __invoke(Speaker $speaker): JsonResponse
    {
        return JsonResponse::fromJsonString(sprintf(
            "The speaker  %s will present the talk: %s !",
            $speaker->getName(),
            $speaker->getTalk()
        ));
    }
}
