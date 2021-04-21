<?php

namespace App\Service\Grpc\Client;

use Google\Protobuf\Internal\Message;
use Infra\Conference\SpeakerReply;
use Infra\Conference\SpeakerRequest;

class SpeakerClientService
{
    public const GET_METHOD_SERVICE = 'getSpeaker';

    /**
     * {@inheritDoc}
     */
    public function getSpeakerById(SpeakerRequest $request): SpeakerReply
    {
        $reply = new SpeakerReply();
        $reply->mergeFromString($this->makeRequest($request, self::GET_METHOD_SERVICE));

        return $reply;
    }

    private function makeRequest(Message $message, string $method): string
    {
        $body = $message->serializeToString();

        $ch = curl_init("http://127.0.0.1:8000/{$method}");

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
