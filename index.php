<?php

include './vendor/autoload.php';
include 'settings.php';

use WS\Http\RequestFactory;
use WS\Controller\DnsController;
use WS\Dns\DnsService;
use WS\Dns\Credentials;

if (!defined('WS_USERNAME')) {
    define('WS_USERNAME', 'user');
}

if (!defined('WS_PASSWORD')) {
    define('WS_PASSWORD', 'pass');
}

if (!defined('WS_DOMAIN')) {
    define('WS_DOMAIN', 'domain');
}

$credential = new Credentials(WS_USERNAME, WS_PASSWORD, WS_DOMAIN);
$dnsService = new DnsService($credential);


$request = RequestFactory::createRequest($_SERVER, $_POST);

//var_dump($_SERVER, $_POST, $request);

$controller = new DNSController();
switch ($request->getRoutePath()) {
    case '/':
    case '/list':
        $controller->listAction($request, $dnsService);
        break;

    case '/create':
        $controller->createAction($request, $dnsService);
        break;

    case '/delete':
        $controller->deleteAction($request, $dnsService);
        break;
}

