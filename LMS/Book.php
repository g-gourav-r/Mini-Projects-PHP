<?php
class Book {
    public $title;
    public $isbn;
    public $author;
    public $genre;
    public $availability;

    public function __construct($title, $isbn, $author, $genre, $availability) {
        $this->title = $title;
        $this->isbn = $isbn;
        $this->author = $author;
        $this->genre = $genre;
        $this->availability = $availability;
    }
}
?>