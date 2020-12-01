<?php


namespace Code;


use Code\Exceptions\QueueOverloadException;

class Queue
{
    protected $item = [];

    /**
     * Push item to the queue
     *
     * @param $item
     * @throws QueueOverloadException
     */
    public function push($item)
    {
        if($this->getCount() >= 5) {
            throw new QueueOverloadException();
        }

        $this->item[] = $item;
    }

    /**
     * Remove Item
     *
     * @param $item
     * @return mixed
     */
    public function remove($item = null)
    {
        if ($item){
            return $this->removeItemFromArray($item);
        }

        return array_pop($this->item);
    }

    /**
     * Get total item
     *
     * @return int
     */
    public function getCount()
    {
        return count($this->item);
    }

    /**
     * Remove specific item from array
     *
     * @param $item
     * @return array
     */
    private function removeItemFromArray($item)
    {
        foreach ($this->item as $key => $value) {
            if ($item === $value) {
                unset($this->item[$key]);
                break;
            }
        }

        return $this->item;
    }

    /**
     * Reset Queue
     */
    public function resetQueue()
    {
        $this->item = [];
    }
}