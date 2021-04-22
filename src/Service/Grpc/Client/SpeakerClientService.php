<?php

namespace App\Service\Grpc\Client;

use Google\Protobuf\Internal\Message;
use Infra\Conference\SpeakerReply;
use Infra\Conference\SpeakerRequest;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SpeakerClientService
{
    public const GET_METHOD_SERVICE = 'getSpeaker';

    /** @var HttpClientInterface */
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

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

        $response = $this->client->request(
            "GET",
            "http://127.0.0.1:8000/{$method}",
            ['body' => $body]
        );

        return $response->getContent();
    }
}
