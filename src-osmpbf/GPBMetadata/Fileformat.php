<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: fileformat.proto

namespace GPBMetadata;

class Fileformat
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
fileformat.protoOSMPBF"�
Blob
raw_size (H�
raw (H 
	zlib_data (H 
	lzma_data (H !
OBSOLETE_bzip2_data (BH 
lz4_data (H 
	zstd_data (H B
dataB
	_raw_size"R

BlobHeader
type (	
	indexdata (H �
datasize (B

_indexdataB
crosby.binarybproto3'
        , true);

        static::$is_initialized = true;
    }
}

