<?php

namespace Code;


class LockDownChild extends LockDown
{
    /**
     * Get a unique ID
     *
     * @return string
     */
    public function getID(): string
    {
        return parent::getID();
    }
}