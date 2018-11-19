<?php

namespace Ws\Controller;

use WS\Dns\DnsServiceInterface;
use WS\Http\Request;
use WS\Template\Template;

class DnsController
{
    public function listAction(Request $request, DnsServiceInterface $dnsService)
    {
        $template = new Template(__DIR__.'/../Resources/templates/list.php');
        $template->records = $dnsService->recordsList();
        $template->menuLabel = 'Create new record';
        $template->menuLink = '/create';
        $response = $template->render();

        echo ($response);
    }

    public function createAction(Request $request)
    {
        $template = new Template(__DIR__.'/../Resources/templates/create.php');
        $template->menuLabel = 'Back to listing';
        $template->menuLink = '/list';

        $response = $template->render();
        echo ($response);
        if ($request->isPost()) {
            $type = $request->post('type', 'a');
            $name = $request->post('name');
            $content = $request->post('content');
            var_dump($type, $name, $content);
        }
    }

    public function deleteAction(Request $request)
    {
        echo 'delete';
    }
}