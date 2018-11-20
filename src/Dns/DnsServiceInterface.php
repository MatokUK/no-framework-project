<?php

namespace WS\Dns;

use WS\Dns\Record\AbstractRecord;

interface DnsServiceInterface
{
    /**
     * @return AbstractRecord[]
     */
    public function recordsList(): array;

    public function createRecord(AbstractRecord $record): bool;

    public function deleteRecord(string $id);
}