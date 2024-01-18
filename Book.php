<?php

class Book
{
    private $title;
    private $isBorrowed;

    public function __construct($title)
    {
        $this->title = $title;
        $this->isBorrowed = false;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function isBorrowed()
    {
        return $this->isBorrowed;
    }

    public function borrow()
    {
        $this->isBorrowed = true;
    }

    public function returnBook()
    {
        $this->isBorrowed = false;
    }
}
?>
