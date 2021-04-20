<?php

namespace App\Service\Grpc;

use Infra\Conference\ConferenceInterface;
use Google\Protobuf\Internal\Message;
use Infra\Conference\SpeakerReply;
use Infra\Conference\SpeakerRequest;

class SpeakerClientService implements ConferenceInterface
{
    public const GET_METHOD_SERVICE = 'getSpeaker';

    /**
     * {@inheritDoc}
     */
    public function getSpeaker(SpeakerRequest $request): SpeakerReply
    {
        $reply = new SpeakerReply();
        $reply->mergeFromString($this->makeRequest($request, self::GET_METHOD_SERVICE));

        return $reply;
    }

    private function makeRequest(Message $message, string $method): string
    {
        $body = $message->serializeToString();

        $ch = curl_init("http://localhost:8000/{$method}");

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $body,
        ]);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}
