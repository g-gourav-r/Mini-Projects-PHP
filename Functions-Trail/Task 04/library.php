<?php

class Book {
    public $title;
    public $isbn;
    public $author;
    public $genre;
    public $availability;

    public function __construct($title, $isbn, $author, $genre, $availability = true){
        $this->title = $title;
        $this->isbn = $isbn;
        $this->author = $author;
        $this->genre = $genre;
        $this->availability = $availability;
    }
}

$library = array();

function addbook($library){
    $title = readline("Enter the title of the book: ");
    $isbn  = readline("\nEnter the unique isbn: ");
    $author = readline("\nEnter the author name: ");
    $genre = readline("\nEnter the genre: ");
    //Use of if else statement
    if(!empty($title) and !empty($isbn) and !empty($author) and !empty($genre)){
        echo "By default, the availability of the book is set to available\n";
        $newbook = new Book($title, $isbn, $author, $genre, $availability = true);
        $library[] = $newbook;
        echo "Book ".$title. " by ".$author." added Successfully";
    }
    else{
        echo "Some of the values are missing, Operation Failed\n";
    }
    return $library;
}

function deletebook($library){
    $isbn = readline("Enter the isbn of the book to be removed: ");
    foreach($library as $key => $book){
        if($book->isbn == $isbn){
            unset($library[$key]);
            echo "Book with ISBN $isbn has been removed.\n";
            return $library;
        }
    }
    echo "There are no books with isbn ".$isbn." found\n";
    return $library;
}

function searchbook($library){
    $isbn = readline("Enter the isbn of the book: ");
    foreach($library as $book){
        if($book->isbn == $isbn){
            echo "Title ".$book->title."\n";
            echo "ISBN: " . $book->isbn . "\n";
            echo "Author: " . $book->author . "\n";
            echo "Genre: " . $book->genre . "\n";
            echo "Availability: " . ($book->availability ? "Available" : "Not Available") . "\n";
            echo "\n";
            return;
        }
    }
    echo "There are no books with isbn ".$isbn." found\n";
}

function viewbooks($library){
    if(empty($library)){
        echo "No books to show\n";
    }else{
    //Use of foreach loop
    foreach ($library as $book){
        echo "Title: ".$book->title."\n";
        echo "ISBN: " . $book->isbn . "\n";
        echo "Author: " . $book->author . "\n";
        echo "Genre: " . $book->genre . "\n";
        echo "Availability: " . ($book->availability ? "Available" : "Not Available") . "\n";
        echo "\n";
    }
}
}
function checkedout($library){
    $isbn = readline("Enter the ISBN : ");
    foreach($library as $book){
        if($book->isbn == $isbn){
            $book->availability = false;
        }
    }

}

$flag = true;
// Use of while loop
while($flag){
    echo "Choose an option\n1. Add a book\t2. Remove a book\n3. View books\t4. Search book\n5.Check-out a book\tq. Quit\n";
    $ch = readline("Enter your choice: ");

    //Usage of Switch Case
    switch($ch){
        case '1':
            $library = addbook($library);
            break;
        case '2':
            $library = deletebook($library);
            break;
        case '3':
            viewbooks($library);
            break;
        case '4':
            searchbook($library);
            break;
        case '5':
            checkedout($library);
            break;
        case 'q':
            $flag = false;
            break;
        default :
            echo "Invalid option\n";
    }
}
?>