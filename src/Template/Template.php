<?php

namespace WS\Template;

use WS\Template\Exception\NotFoundException;

class Template
{
    /** @var string */
    private $filename;

    /** @var array */
    private $vars = [];

    public function __construct(string $filename)
    {
        if (!is_file($filename)) {
            throw new NotFoundException(sprintf('Cannot find template "%s"', $filename));
        }

        $this->filename = $filename;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function render()
    {
       // var_dump($this);
      //  exit;
        ob_start();
        extract($this->vars, EXTR_SKIP);
        include $this->filename;
        $content = ob_get_clean();
       // $content = file_get_contents();

        return $content;
    }
}