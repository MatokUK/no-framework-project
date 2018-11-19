<?php

namespace WS\Test;

use PHPUnit\Framework\TestCase;
use WS\Dns\Record\ARecord;

class ARecordTest extends TestCase
{
    public function testRecordDataAttributes()
    {
        $record = new ARecord('@', '1.2.3.4');
        $recordData = $record->getData();

        $this->assertArrayHasKey('type', $recordData);
        $this->assertArrayHasKey('name', $recordData);
        $this->assertArrayHasKey('content', $recordData);
        $this->assertArrayHasKey('ttl', $recordData);
    }

    public function testRecordType()
    {
        $record = new ARecord('@', '1.2.3.4');
        $recordData = $record->getData();

        $this->assertEquals('A', $recordData['type']);
    }
}