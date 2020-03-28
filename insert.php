<?php
    require 'db.php';
    $sql = 'INSERT INTO books(BookName, CategoryID, AuthorID, PublisherID, 
    BookDescription, BookPrice, BookNumPages, BookISBN, BookStatus) 
    VALUES (:BookName, :CategoryID, :AuthorID, :PublisherID, :BookDescription, 
            :BookPrice, :BookNumPages, :BookISBN, :BookStatus)';

    $statement =  $connection->prepare($sql);
    
    $result = $statement->execute( array( ':BookName'=>$_POST['BookName'], ':CategoryID'=>$_POST['CategoryName'], 
                                          ':AuthorID'=>$_POST['AuthorName'], ':PublisherID'=>$_POST['PublisherName'], 
                                          ':BookDescription'=>$_POST['BookDescription'], ':BookPrice'=>$_POST['BookPrice'], 
                                          ':BookNumPages'=>$_POST['BookNumPages'], ':BookISBN'=>$_POST['BookISBN'], 
                                          ':BookStatus'=>$_POST['BookStatus']) );
    header("Location: booklist.php");
?>