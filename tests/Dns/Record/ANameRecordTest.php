<?php

namespace WS\Test;

use PHPUnit\Framework\TestCase;
use WS\Dns\Record\ANameRecord;

class ANameRecordTest extends TestCase
{
    public function testRecordType()
    {
        $record = new ANameRecord('@', 'something.scaledo.com');
        $recordData = $record->getData();

        $this->assertEquals('ANAME', $recordData['type']);
    }
}