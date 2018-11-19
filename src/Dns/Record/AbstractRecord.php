<?php

namespace WS\Dns\Record;

abstract class AbstractRecord
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $type;

    /** @var string */
    protected $name;

    /** @var string */
    protected $content;

    /** @var int */
    protected $ttl;

    public function __construct(string $name, string $content, int $ttl = 600)
    {
        $this->name = $name;
        $this->content = $content;
        $this->ttl = $ttl;
    }

    public function setId()
    {
        $this->id = $id;
    }

    public function getId()
    {

    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getTtl(): int
    {
        return $this->ttl;
    }

    public function setTtl(int $ttl)
    {
        $this->ttl = $ttl;
    }

    final public function getData(): array
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'content' => $this->content,
            'ttl' => $this->ttl,
        ];
    }
}