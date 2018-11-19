<?php

namespace WS\Test;

use PHPUnit\Framework\TestCase;
use WS\Dns\Record\CNameRecord;

class CNameRecordTest extends TestCase
{
    public function testRecordType()
    {
        $record = new CNameRecord('@', 'something.scaledo.com');
        $recordData = $record->getData();

        $this->assertEquals('CNAME', $recordData['type']);
    }
}