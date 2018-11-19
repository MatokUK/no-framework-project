<?php

namespace WS\Dns;

use WS\Dns\Record\AbstractRecord;
use WS\Dns\Record\ARecord;
use WS\Dns\RecordFactory\RecordFactory;

class DnsService implements DnsServiceInterface
{
    private $credentials;

    public function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }

    public function recordsList(): array
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://rest.websupport.sk/v1/user/self/zone/'.$this->credentials->getDomain().'/record', [
            'auth' => [
                $this->credentials->getUsername(),
                $this->credentials->getPassword()
            ]
        ]);

        $decoded = json_decode($res->getBody()->getContents(), true);

        $result = [];
        foreach ($decoded['items'] as $item) {
            var_dump('aaa', $item, 'xxx');
            $record = RecordFactory::createFromArray($item);
            $result[]  = $record;
        }

        return $result;

    }

    public function createRecord(AbstractRecord $record): bool
    {

    }
}