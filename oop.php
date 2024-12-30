<?php

class Book {
    // Private properties
    private $title;
    private $availableCopies;

    // Constructor to initialize properties
    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    // Getter for title
    public function getTitle() {
        return $this->title;
    }

    // Getter for availableCopies
    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    // Method to borrow a book
    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        } else {
            return false;
        }
    }

    // Method to return a book
    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    // Private property
    private $name;

    // Constructor to initialize the name
    public function __construct($name) {
        $this->name = $name;
    }

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Method to borrow a book
    public function borrowBook($book) {
        if ($book->borrowBook()) {
            echo $this->name . " successfully borrowed '" . $book->getTitle() . "'.\n";
        } else {
            echo "No copies available for '" . $book->getTitle() . "'.\n";
        }
    }

    // Method to return a book
    public function returnBook($book) {
        $book->returnBook();
        echo $this->name . " successfully returned '" . $book->getTitle() . "'.\n";
    }
}

// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Members borrowing books
$member1->borrowBook($book1);
echo '</br>';
$member2->borrowBook($book2);

// Display available copies
echo '</br>';
echo "Available Copies of '" . $book1->getTitle() . "': " . $book1->getAvailableCopies() . "\n";
echo '</br>';
echo "Available Copies of '" . $book2->getTitle() . "': " . $book2->getAvailableCopies() . "\n";

?>
