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
        $serviceUrl = 'https://rest.websupport.sk/v1/user/self/zone/'.$this->credentials->getDomain().'/record';
        $curl = $this->initCurlWithAuth($serviceUrl);
        $response = curl_exec($curl);
        $decoded = json_decode($response, true);

        $result = [];
        foreach ($decoded['items'] as $item) {
            $record = RecordFactory::createFromArray($item);
            $result[]  = $record;
        }

        return $result;
    }

    public function createRecord(AbstractRecord $record): bool
    {
        $serviceUrl = 'https://rest.websupport.sk/v1/user/self/zone/'.$this->credentials->getDomain().'/record';
        $curl = $this->initCurlWithAuth($serviceUrl);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($record->getData()));
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        return $response['status'] === 'success';
    }

    public function deleteRecord(string $id)
    {
        $serviceUrl = 'https://rest.websupport.sk/v1/user/self/zone/'.$this->credentials->getDomain().'/record/'.$id;
        $curl = $this->initCurlWithAuth($serviceUrl);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
    }

    private function initCurlWithAuth($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $this->credentials->getUsername().':'.$this->credentials->getPassword());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

        return $curl;
    }
}