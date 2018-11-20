<?php

namespace Ws\Controller;

use WS\Dns\DnsServiceInterface;
use WS\Dns\RecordFactory\RecordFactory;
use WS\Http\Request;
use WS\Session\FlashMessage;
use WS\Template\Template;

class DnsController
{
    public function listAction(Request $request, DnsServiceInterface $dnsService)
    {
        $flashMessage = new FlashMessage();
        $template = new Template(__DIR__.'/../Resources/templates/list.php');
        $template->records = $dnsService->recordsList();
        $template->menuLabel = 'Create new record';
        $template->menuLink = '/create';
        $template->flashMessage = $flashMessage;
        echo $template->render();
    }

    public function createAction(Request $request, DnsServiceInterface $dnsService)
    {
        $flashMessage = new FlashMessage();
        if ($request->isPost()) {
            $type = $request->post('type', 'a');
            $name = $request->post('name');
            $content = $request->post('content');
            $ttl = $request->post('ttl', 600);
            $priority = $request->post('prio');
            $weight = $request->post('weight');
            $port = $request->post('port');

            $record = RecordFactory::createFromArray(['type' => $type, 'name' => $name, 'content' => $content, 'ttl' => $ttl, 'prio' => $priority, 'weight' => $weight, 'port' => $port]);
            $apiResult = $dnsService->createRecord($record);
            if (true === $apiResult) {
                $flashMessage->addSuccess('Record was created');
                $this->redirect('/list');
            }

            // fail:
            $flashMessage->addError('Error during api call - probably incorrect data.');
            $flashMessage->addError('Error: '.$apiResult);
        }


        $template = new Template(__DIR__.'/../Resources/templates/create.php');
        $template->menuLabel = 'Back to listing';
        $template->menuLink = '/list';
        $template->flashMessage = $flashMessage;

        echo $template->render();
    }

    public function deleteAction(Request $request, DnsServiceInterface $dnsService)
    {
        $deleteId = $request->query('id');

        if ($request->isPost()) {
            $flashMessage = new FlashMessage();
            $flashMessage->addSuccess('Record was removed');
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