<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: osmformat.proto

namespace OSMPBF;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>OSMPBF.Way</code>
 */
class Way extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int64 id = 1;</code>
     */
    protected $id = 0;
    /**
     * Parallel arrays.
     *
     * Generated from protobuf field <code>repeated uint32 keys = 2 [packed = true];</code>
     */
    private $keys;
    /**
     * Generated from protobuf field <code>repeated uint32 vals = 3 [packed = true];</code>
     */
    private $vals;
    /**
     * Generated from protobuf field <code>optional .OSMPBF.Info info = 4;</code>
     */
    protected $info = null;
    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 refs = 8 [packed = true];</code>
     */
    private $refs;
    /**
     * The following two fields are optional. They are only used in a special
     * format where node locations are also added to the ways. This makes the
     * files larger, but allows creating way geometries directly.
     * If this is used, you MUST set the optional_features tag "LocationsOnWays"
     * and the number of values in refs, lat, and lon MUST be the same.
     *
     * Generated from protobuf field <code>repeated sint64 lat = 9 [packed = true];</code>
     */
    private $lat;
    /**
     * DELTA coded, optional
     *
     * Generated from protobuf field <code>repeated sint64 lon = 10 [packed = true];</code>
     */
    private $lon;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $id
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $keys
     *           Parallel arrays.
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $vals
     *     @type \OSMPBF\Info $info
     *     @type array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $refs
     *           DELTA coded
     *     @type array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $lat
     *           The following two fields are optional. They are only used in a special
     *           format where node locations are also added to the ways. This makes the
     *           files larger, but allows creating way geometries directly.
     *           If this is used, you MUST set the optional_features tag "LocationsOnWays"
     *           and the number of values in refs, lat, and lon MUST be the same.
     *     @type array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $lon
     *           DELTA coded, optional
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Osmformat::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int64 id = 1;</code>
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Generated from protobuf field <code>int64 id = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Parallel arrays.
     *
     * Generated from protobuf field <code>repeated uint32 keys = 2 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * Parallel arrays.
     *
     * Generated from protobuf field <code>repeated uint32 keys = 2 [packed = true];</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setKeys($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::UINT32);
        $this->keys = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 vals = 3 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getVals()
    {
        return $this->vals;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 vals = 3 [packed = true];</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setVals($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::UINT32);
        $this->vals = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional .OSMPBF.Info info = 4;</code>
     * @return \OSMPBF\Info|null
     */
    public function getInfo()
    {
        return $this->info;
    }

    public function hasInfo()
    {
        return isset($this->info);
    }

    public function clearInfo()
    {
        unset($this->info);
    }

    /**
     * Generated from protobuf field <code>optional .OSMPBF.Info info = 4;</code>
     * @param \OSMPBF\Info $var
     * @return $this
     */
    public function setInfo($var)
    {
        GPBUtil::checkMessage($var, \OSMPBF\Info::class);
        $this->info = $var;

        return $this;
    }

    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 refs = 8 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRefs()
    {
        return $this->refs;
    }

    /**
     * DELTA coded
     *
     * Generated from protobuf field <code>repeated sint64 refs = 8 [packed = true];</code>
     * @param array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRefs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::SINT64);
        $this->refs = $arr;

        return $this;
    }

    /**
     * The following two fields are optional. They are only used in a special
     * format where node locations are also added to the ways. This makes the
     * files larger, but allows creating way geometries directly.
     * If this is used, you MUST set the optional_features tag "LocationsOnWays"
     * and the number of values in refs, lat, and lon MUST be the same.
     *
     * Generated from protobuf field <code>repeated sint64 lat = 9 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * The following two fields are optional. They are only used in a special
     * format where node locations are also added to the ways. This makes the
     * files larger, but allows creating way geometries directly.
     * If this is used, you MUST set the optional_features tag "LocationsOnWays"
     * and the number of values in refs, lat, and lon MUST be the same.
     *
     * Generated from protobuf field <code>repeated sint64 lat = 9 [packed = true];</code>
     * @param array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLat($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::SINT64);
        $this->lat = $arr;

        return $this;
    }

    /**
     * DELTA coded, optional
     *
     * Generated from protobuf field <code>repeated sint64 lon = 10 [packed = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * DELTA coded, optional
     *
     * Generated from protobuf field <code>repeated sint64 lon = 10 [packed = true];</code>
     * @param array<int>|array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLon($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::SINT64);
        $this->lon = $arr;

        return $this;
    }

}

