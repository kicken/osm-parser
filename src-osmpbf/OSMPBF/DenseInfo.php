<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: osmformat.proto

namespace OSMPBF;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 ** Optional metadata that may be included into each primitive. Special dense format used in DenseNodes. 
 *
 * Generated from protobuf message <code>OSMPBF.DenseInfo</code>
 */
class DenseInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated int32 version = 1 [packed = true];</code>
     */
    private $version;
    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 timestamp = 2 [packed = true];</code>
     */
    private $timestamp;
    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 changeset = 3 [packed = true];</code>
     */
    private $changeset;
    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint32 uid = 4 [packed = true];</code>
     */
    private $uid;
    /**
     * String IDs for usernames. DELTA coded
     *
     * Generated from protobuf field <code>repeated sint32 user_sid = 5 [packed = true];</code>
     */
    private $user_sid;
    /**
     * The visible flag is used to store history information. It indicates that
     * the current object version has been created by a delete operation on the
     * OSM API.
     * When a writer sets this flag, it MUST add a required_features tag with
     * value "HistoricalInformation" to the HeaderBlock.
     * If this flag is not available for some object it MUST be assumed to be
     * true if the file has the required_features tag "HistoricalInformation"
     * set.
     *
     * Generated from protobuf field <code>repeated bool visible = 6 [packed = true];</code>
     */
    private $visible;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $version
     *     @type array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $timestamp
     *           DELTA coded
     *     @type array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $changeset
     *           DELTA coded
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $uid
     *           DELTA coded
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $user_sid
     *           String IDs for usernames. DELTA coded
     *     @type array<bool>|\Google\Protobuf\Internal\RepeatedField $visible
     *           The visible flag is used to store history information. It indicates that
     *           the current object version has been created by a delete operation on the
     *           OSM API.
     *           When a writer sets this flag, it MUST add a required_features tag with
     *           value "HistoricalInformation" to the HeaderBlock.
     *           If this flag is not available for some object it MUST be assumed to be
     *           true if the file has the required_features tag "HistoricalInformation"
     *           set.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Osmformat::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated int32 version = 1 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Generated from protobuf field <code>repeated int32 version = 1 [packed = true];</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setVersion($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->version = $arr;

        return $this;
    }

    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 timestamp = 2 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 timestamp = 2 [packed = true];</code>
     * @param array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTimestamp($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::SINT64);
        $this->timestamp = $arr;

        return $this;
    }

    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 changeset = 3 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getChangeset()
    {
        return $this->changeset;
    }

    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 changeset = 3 [packed = true];</code>
     * @param array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setChangeset($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::SINT64);
        $this->changeset = $arr;

        return $this;
    }

    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint32 uid = 4 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint32 uid = 4 [packed = true];</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setUid($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::SINT32);
        $this->uid = $arr;

        return $this;
    }

    /**
     * String IDs for usernames. DELTA coded
     *
     * Generated from protobuf field <code>repeated sint32 user_sid = 5 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUserSid()
    {
        return $this->user_sid;
    }

    /**
     * String IDs for usernames. DELTA coded
     *
     * Generated from protobuf field <code>repeated sint32 user_sid = 5 [packed = true];</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setUserSid($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::SINT32);
        $this->user_sid = $arr;

        return $this;
    }

    /**
     * The visible flag is used to store history information. It indicates that
     * the current object version has been created by a delete operation on the
     * OSM API.
     * When a writer sets this flag, it MUST add a required_features tag with
     * value "HistoricalInformation" to the HeaderBlock.
     * If this flag is not available for some object it MUST be assumed to be
     * true if the file has the required_features tag "HistoricalInformation"
     * set.
     *
     * Generated from protobuf field <code>repeated bool visible = 6 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * The visible flag is used to store history information. It indicates that
     * the current object version has been created by a delete operation on the
     * OSM API.
     * When a writer sets this flag, it MUST add a required_features tag with
     * value "HistoricalInformation" to the HeaderBlock.
     * If this flag is not available for some object it MUST be assumed to be
     * true if the file has the required_features tag "HistoricalInformation"
     * set.
     *
     * Generated from protobuf field <code>repeated bool visible = 6 [packed = true];</code>
     * @param array<bool>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setVisible($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::BOOL);
        $this->visible = $arr;

        return $this;
    }

}

