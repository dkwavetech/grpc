<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/conference.proto

namespace Infra\Conference;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>infra.conference.SpeakerReply</code>
 */
class SpeakerReply extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 id = 1;</code>
     */
    protected $id = 0;
    /**
     * Generated from protobuf field <code>string name = 2;</code>
     */
    protected $name = '';
    /**
     * Generated from protobuf field <code>string talk = 3;</code>
     */
    protected $talk = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $id
     *     @type string $name
     *     @type string $talk
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Conference::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 id = 1;</code>
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Generated from protobuf field <code>int32 id = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt32($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string name = 2;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Generated from protobuf field <code>string name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string talk = 3;</code>
     * @return string
     */
    public function getTalk()
    {
        return $this->talk;
    }

    /**
     * Generated from protobuf field <code>string talk = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setTalk($var)
    {
        GPBUtil::checkString($var, True);
        $this->talk = $var;

        return $this;
    }

}

