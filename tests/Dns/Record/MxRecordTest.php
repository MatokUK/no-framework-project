<?php

namespace WS\Test;

use PHPUnit\Framework\TestCase;
use WS\Dns\Record\MxRecord;

class MxRecordTest extends TestCase
{
    public function testRecordType()
    {
        $record = new MxRecord('@', 'mail1.scaledo.com');
        $recordData = $record->getData();

        $this->assertEquals('MX', $recordData['type']);
    }
}