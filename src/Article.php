<?php

namespace Code;


class Article
{
    public $title;

    public function slug()
    {
        $title = trim(strtolower($this->title));

        // remove other then letters
        $title = preg_replace("/[^a-zA-Z]/", " ", $title);;

        // remove all white space
        $title = preg_replace("/\s+/", "_", $title);

        return $title;
    }
}