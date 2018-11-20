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

    /** @var int */
    protected $priority;

    protected $weight;

    protected $port;

    public function __construct(string $name, string $content, $ttl = 600, int $priority = null, $weight = null, $port = null)
    {
        $this->name = $name;
        $this->content = $content;
        $this->ttl = $ttl;
        $this->priority = $priority;
        $this->port = $port;
        $this->weight = $weight;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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

    public function getPriority()
    {
        return $this->priority;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getPort()
    {
        return $this->port;
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