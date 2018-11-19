<?php

namespace WS\Dns\RecordFactory;

use WS\Dns\Record\AbstractRecord;
use WS\Dns\Record\ARecord;
use WS\Dns\Record\AAAARecord;
use WS\Dns\Record\MxRecord;
use WS\Dns\Record\NsRecord;
use WS\Dns\Record\TxtRecord;
use WS\Dns\RecordFactory\Exception\InvalidTypeException;

abstract class RecordFactory
{
    public static function createFromArray($data): AbstractRecord
    {
        $type = strtoupper($data['type']);
        switch ($type) {
            case 'A':
                $class = ARecord::class;
                break;
            case 'AAAA':
                $class = AAAARecord::class;
                break;
            case 'MX':
                $class = MxRecord::class;
                break;
            case 'NS':
                $class = NsRecord::class;
                break;
            case 'TXT':
                $class = TxtRecord::class;
                break;
            default:
                throw new InvalidTypeException(sprintf('Dont know how to create "%s" type', $type));
        }

        return new $class($data['name'], $data['content'], $data['ttl']);
    }
}