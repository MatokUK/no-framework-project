<?php

namespace WS\Test\Http;

use PHPUnit\Framework\TestCase;
use WS\Template\Template;

class TemplateTest extends TestCase
{
    public function testSingleVariableReplace()
    {
        $file = __DIR__.'/Resources/tpl/single.php';

        $template = new Template($file);
        $template->phrase = 'is coming';

        $renderedTemplate = $template->render();
        $this->assertEquals('<h1>Winter is coming</h1>', $renderedTemplate);
    }

    public function testScalarsLoop()
    {
        $file = __DIR__.'/Resources/tpl/list_scalar.php';

        $template = new Template($file);
        $template->list = ['Cersei Lannister', 'Ilyn Payne', 'Melisandre', 'The Mountain'];

        $renderedTemplate = $template->render();
        $this->assertContains('<h1>Kill List</h1>', $renderedTemplate);
        $this->assertContains('<li>Melisandre</li>', $renderedTemplate);
        $this->assertContains('<li>The Mountain</li>', $renderedTemplate);
    }

    public function testObjectsLoop()
    {
        $file = __DIR__.'/Resources/tpl/list_object.php';

        $template = new Template($file);

        $template->list = [$this->createDrink('Coffee', 'Delicious drink'), $this->createDrink('Beer', 'Better than coffee')];

        $renderedTemplate = $template->render();
        $this->assertContains('<h1>Drink List</h1>', $renderedTemplate);
        $this->assertContains('<dt>Coffee</dt>', $renderedTemplate);
        $this->assertContains('<dt>Beer</dt>', $renderedTemplate);
        $this->assertContains('<dd>Delicious drink</dd>', $renderedTemplate);
        $this->assertContains('<dd>Better than coffee</dd>', $renderedTemplate);
    }

    /**
     * @expectedException \WS\Template\Exception\NotFoundException
     */
    public function testNonExistingFileThrowsException()
    {
        $template = new Template('non-existing.php');

        $template->render();
    }

    private function createDrink($name, $description)
    {
        return new class($name, $description) {
            private $name;
            private $description;

            public function __construct($name, $description)
            {
                $this->name = $name;
                $this->description = $description;
            }

            public function getDrink()
            {
                return $this->name;
            }

            public function getDescription()
            {
                return $this->description;
            }
        };
    }
}