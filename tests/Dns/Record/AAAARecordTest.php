<?php

namespace WS\Test\Record;

use PHPUnit\Framework\TestCase;
use WS\Dns\Record\AAAARecord;

class AAAARecordTest extends TestCase
{
    public function testRecordType()
    {
        $record = new AAAARecord('@', '2001:db8::3');
        $recordData = $record->getData();

        $this->assertEquals('AAAA', $recordData['type']);
    }
}