<?php

require_once 'Book.php';

class Library
{
    private $books;

    public function __construct()
    {
        $this->books = [];
        $this->initializeBooks();
    }

    private function initializeBooks()
    {
        $this->addBook(new Book("To Kill a Mockingbird. Harper Lee"));
        $this->addBook(new Book("1984. George Orwell"));
        $this->addBook(new Book("F.Scott Fitzgerald"));
        $this->addBook(new Book("The Great Gatsby J.D.Salinger"));
        $this->addBook(new Book("The Lord of the Rings J.R.R. Tolkien"));
        $this->addBook(new Book("The Girl on the Train Paula Hawkins"));
        $this->addBook(new Book("The Fault in Our Stars John Green"));
    }

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function borrowBook($title)
    {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title && !$book->isBorrowed()) {
                $book->borrow();
                return "The book '{$title}' has been borrowed.";
            } elseif ($book->getTitle() === $title && $book->isBorrowed()) {
                return "The book '{$title}' is already borrowed.";
            }
        }

        return "The book '{$title}' does not exist in the library.";
    }

    public function displayAvailableBooks()
    {
        if (empty($this->books)) {
            echo "<p>No available books.</p>";
        } else {
            echo "<ul>";
            foreach ($this->books as $book) {
                if (!$book->isBorrowed()) {
                    echo "<li>{$book->getTitle()}</li>";
                }
            }
            echo "</ul>";
        }
    }
}
?>
