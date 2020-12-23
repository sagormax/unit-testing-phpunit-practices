<?php

namespace Code;


abstract class AbstructItem
{
    /**
     * Item name
     *
     * @var
     */
    protected $name;

    /**
     * Name prefix
     *
     * @var
     */
    protected $prefix;

    /**
     * AbstructItem constructor.
     *
     * @param $prefix
     */
    public function __construct($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Get Item Name
     *
     * @return string
     */
    abstract protected function getPrefix() : string;

    /**
     * Set item name
     *
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * Get full name
     *
     * @return string
     */
    public function getFullName(): string
    {
        return $this->prefix . " " . $this->name;
    }
}