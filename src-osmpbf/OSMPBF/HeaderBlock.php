<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: osmformat.proto

namespace OSMPBF;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>OSMPBF.HeaderBlock</code>
 */
class HeaderBlock extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>optional .OSMPBF.HeaderBBox bbox = 1;</code>
     */
    protected $bbox = null;
    /**
     * Additional tags to aid in parsing this dataset 
     *
     * Generated from protobuf field <code>repeated string required_features = 4;</code>
     */
    private $required_features;
    /**
     * Generated from protobuf field <code>repeated string optional_features = 5;</code>
     */
    private $optional_features;
    /**
     * Generated from protobuf field <code>optional string writingprogram = 16;</code>
     */
    protected $writingprogram = null;
    /**
     * From the bbox field.
     *
     * Generated from protobuf field <code>optional string source = 17;</code>
     */
    protected $source = null;
    /**
     * Replication timestamp, expressed in seconds since the epoch,
     * otherwise the same value as in the "timestamp=..." field
     * in the state.txt file used by Osmosis.
     *
     * Generated from protobuf field <code>optional int64 osmosis_replication_timestamp = 32;</code>
     */
    protected $osmosis_replication_timestamp = null;
    /**
     * Replication sequence number (sequenceNumber in state.txt).
     *
     * Generated from protobuf field <code>optional int64 osmosis_replication_sequence_number = 33;</code>
     */
    protected $osmosis_replication_sequence_number = null;
    /**
     * Replication base URL (from Osmosis' configuration.txt file).
     *
     * Generated from protobuf field <code>optional string osmosis_replication_base_url = 34;</code>
     */
    protected $osmosis_replication_base_url = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \OSMPBF\HeaderBBox $bbox
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $required_features
     *           Additional tags to aid in parsing this dataset 
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $optional_features
     *     @type string $writingprogram
     *     @type string $source
     *           From the bbox field.
     *     @type int|string $osmosis_replication_timestamp
     *           Replication timestamp, expressed in seconds since the epoch,
     *           otherwise the same value as in the "timestamp=..." field
     *           in the state.txt file used by Osmosis.
     *     @type int|string $osmosis_replication_sequence_number
     *           Replication sequence number (sequenceNumber in state.txt).
     *     @type string $osmosis_replication_base_url
     *           Replication base URL (from Osmosis' configuration.txt file).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Osmformat::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>optional .OSMPBF.HeaderBBox bbox = 1;</code>
     * @return \OSMPBF\HeaderBBox|null
     */
    public function getBbox()
    {
        return $this->bbox;
    }

    public function hasBbox()
    {
        return isset($this->bbox);
    }

    public function clearBbox()
    {
        unset($this->bbox);
    }

    /**
     * Generated from protobuf field <code>optional .OSMPBF.HeaderBBox bbox = 1;</code>
     * @param \OSMPBF\HeaderBBox $var
     * @return $this
     */
    public function setBbox($var)
    {
        GPBUtil::checkMessage($var, \OSMPBF\HeaderBBox::class);
        $this->bbox = $var;

        return $this;
    }

    /**
     * Additional tags to aid in parsing this dataset 
     *
     * Generated from protobuf field <code>repeated string required_features = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRequiredFeatures()
    {
        return $this->required_features;
    }

    /**
     * Additional tags to aid in parsing this dataset 
     *
     * Generated from protobuf field <code>repeated string required_features = 4;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRequiredFeatures($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->required_features = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string optional_features = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOptionalFeatures()
    {
        return $this->optional_features;
    }

    /**
     * Generated from protobuf field <code>repeated string optional_features = 5;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOptionalFeatures($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->optional_features = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional string writingprogram = 16;</code>
     * @return string
     */
    public function getWritingprogram()
    {
        return isset($this->writingprogram) ? $this->writingprogram : '';
    }

    public function hasWritingprogram()
    {
        return isset($this->writingprogram);
    }

    public function clearWritingprogram()
    {
        unset($this->writingprogram);
    }

    /**
     * Generated from protobuf field <code>optional string writingprogram = 16;</code>
     * @param string $var
     * @return $this
     */
    public function setWritingprogram($var)
    {
        GPBUtil::checkString($var, True);
        $this->writingprogram = $var;

        return $this;
    }

    /**
     * From the bbox field.
     *
     * Generated from protobuf field <code>optional string source = 17;</code>
     * @return string
     */
    public function getSource()
    {
        return isset($this->source) ? $this->source : '';
    }

    public function hasSource()
    {
        return isset($this->source);
    }

    public function clearSource()
    {
        unset($this->source);
    }

    /**
     * From the bbox field.
     *
     * Generated from protobuf field <code>optional string source = 17;</code>
     * @param string $var
     * @return $this
     */
    public function setSource($var)
    {
        GPBUtil::checkString($var, True);
        $this->source = $var;

        return $this;
    }

    /**
     * Replication timestamp, expressed in seconds since the epoch,
     * otherwise the same value as in the "timestamp=..." field
     * in the state.txt file used by Osmosis.
     *
     * Generated from protobuf field <code>optional int64 osmosis_replication_timestamp = 32;</code>
     * @return int|string
     */
    public function getOsmosisReplicationTimestamp()
    {
        return isset($this->osmosis_replication_timestamp) ? $this->osmosis_replication_timestamp : 0;
    }

    public function hasOsmosisReplicationTimestamp()
    {
        return isset($this->osmosis_replication_timestamp);
    }

    public function clearOsmosisReplicationTimestamp()
    {
        unset($this->osmosis_replication_timestamp);
    }

    /**
     * Replication timestamp, expressed in seconds since the epoch,
     * otherwise the same value as in the "timestamp=..." field
     * in the state.txt file used by Osmosis.
     *
     * Generated from protobuf field <code>optional int64 osmosis_replication_timestamp = 32;</code>
     * @param int|string $var
     * @return $this
     */
    public function setOsmosisReplicationTimestamp($var)
    {
        GPBUtil::checkInt64($var);
        $this->osmosis_replication_timestamp = $var;

        return $this;
    }

    /**
     * Replication sequence number (sequenceNumber in state.txt).
     *
     * Generated from protobuf field <code>optional int64 osmosis_replication_sequence_number = 33;</code>
     * @return int|string
     */
    public function getOsmosisReplicationSequenceNumber()
    {
        return isset($this->osmosis_replication_sequence_number) ? $this->osmosis_replication_sequence_number : 0;
    }

    public function hasOsmosisReplicationSequenceNumber()
    {
        return isset($this->osmosis_replication_sequence_number);
    }

    public function clearOsmosisReplicationSequenceNumber()
    {
        unset($this->osmosis_replication_sequence_number);
    }

    /**
     * Replication sequence number (sequenceNumber in state.txt).
     *
     * Generated from protobuf field <code>optional int64 osmosis_replication_sequence_number = 33;</code>
     * @param int|string $var
     * @return $this
     */
    public function setOsmosisReplicationSequenceNumber($var)
    {
        GPBUtil::checkInt64($var);
        $this->osmosis_replication_sequence_number = $var;

        return $this;
    }

    /**
     * Replication base URL (from Osmosis' configuration.txt file).
     *
     * Generated from protobuf field <code>optional string osmosis_replication_base_url = 34;</code>
     * @return string
     */
    public function getOsmosisReplicationBaseUrl()
    {
        return isset($this->osmosis_replication_base_url) ? $this->osmosis_replication_base_url : '';
    }

    public function hasOsmosisReplicationBaseUrl()
    {
        return isset($this->osmosis_replication_base_url);
    }

    public function clearOsmosisReplicationBaseUrl()
    {
        unset($this->osmosis_replication_base_url);
    }

    /**
     * Replication base URL (from Osmosis' configuration.txt file).
     *
     * Generated from protobuf field <code>optional string osmosis_replication_base_url = 34;</code>
     * @param string $var
     * @return $this
     */
    public function setOsmosisReplicationBaseUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->osmosis_replication_base_url = $var;

        return $this;
    }

}

