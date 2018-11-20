<?php

namespace WS\Dns\RecordFactory;

use WS\Dns\Record\AbstractRecord;
use WS\Dns\Record\ANameRecord;
use WS\Dns\Record\CNameRecord;
use WS\Dns\Record\ARecord;
use WS\Dns\Record\AAAARecord;
use WS\Dns\Record\MxRecord;
use WS\Dns\Record\NsRecord;
use WS\Dns\Record\TxtRecord;
use WS\Dns\Record\SrvRecord;
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
            case 'ANAME':
                $class = ANameRecord::class;
                break;
            case 'CNAME':
                $class = CNameRecord::class;
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
            case 'SRV':
                $class = SrvRecord::class;
                break;
            default:
                throw new InvalidTypeException(sprintf('Dont know how to create "%s" type', $type));
        }


        $record = new $class($data['name'], $data['content'], isset($data['ttl']) ? $data['ttl'] : null, $data['prio'], $data['weight'], $data['port']);

        if (isset($data['id'])) {
            $record->setId($data['id']);
        }

        return $record;
    }
}