<?php

namespace WS\Test\RecordFactory;

use PHPUnit\Framework\TestCase;
use WS\Dns\RecordFactory\RecordFactory;
use WS\Dns\Record\ARecord;
use WS\Dns\Record\AAAARecord;
use WS\Dns\Record\NsRecord;
use WS\Dns\Record\MxRecord;

class RecordFactoryTest extends TestCase
{
    /**
     * @dataProvider getRecordTypes
     */
    public function testCreateRecord($type, $expectedClass)
    {
        $record = RecordFactory::createFromArray(['type' => $type, 'name' => 'test_name', 'content' => 'test_content', 'ttl' => 500]);

        $this->assertInstanceOf($expectedClass, $record);
    }


    public function getRecordTypes()
    {
        return [
            ['a', ARecord::class],
            ['aaaa', AAAARecord::class],
            ['ns', NsRecord::class],
            ['mx', MxRecord::class],
        ];
    }
}