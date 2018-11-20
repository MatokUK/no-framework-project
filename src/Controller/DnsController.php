<?php

namespace Ws\Controller;

use WS\Dns\DnsServiceInterface;
use WS\Dns\Record\AAAARecord;
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
        echo $template->render();
    }

    public function createAction(Request $request, DnsServiceInterface $dnsService)
    {
        if ($request->isPost()) {
            $type = $request->post('type', 'a');
            $name = $request->post('name');
            $content = $request->post('content');

            var_dump($type, $name, $content);
            $dnsService->createRecord(new AAAARecord('name', 'cont', 400));
            exit;
            $this->redirect('/list');
        }


        $template = new Template(__DIR__.'/../Resources/templates/create.php');
        $template->menuLabel = 'Back to listing';
        $template->menuLink = '/list';

        echo $template->render();
    }

    public function deleteAction(Request $request, DnsServiceInterface $dnsService)
    {
        $deleteId = $request->query('id');

        if ($request->isPost()) {
            $dnsService->deleteRecord($deleteId);
            $this->redirect('/list');
        }

        $template = new Template(__DIR__.'/../Resources/templates/delete_confirm.php');
        $template->menuLabel = 'Back to listing';
        $template->menuLink = '/list';
        $template->id = $deleteId;

        echo $template->render();
    }

    private function redirect($url)
    {
        header('Location: '.$url);
        exit;
    }
}