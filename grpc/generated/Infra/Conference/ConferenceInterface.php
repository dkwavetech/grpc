<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/conference.proto

namespace Infra\Conference;

/**
 * Protobuf type <code>infra.conference.Conference</code>
 */
interface ConferenceInterface
{
    /**
     * Method <code>getSpeaker</code>
     *
     * @param \Infra\Conference\SpeakerRequest $request
     * @return \Infra\Conference\SpeakerReply
     */
    public function getSpeaker(\Infra\Conference\SpeakerRequest $request);

}
