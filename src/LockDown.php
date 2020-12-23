<?php

namespace Code;


class LockDown
{

    /**
     * LockDown attribute name
     *
     * @var
     */
    protected $name;

    public function __construct()
    {
        $this->name = $this->getToken();
    }

    /**
     * Generate new session id
     *
     * @return string
     */
    public function getSessionID(): string
    {
        return $this->getID() . "-" . $this->getToken();
    }

    /**
     * Get a unique ID
     *
     * @return string
     */
    protected function getID(): string
    {
        return uniqid();
    }

    /**
     * Get a random integer id
     *
     * @return int
     */
    private function getToken(): int
    {
        return rand();
    }
}