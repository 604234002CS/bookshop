<?php
    require 'db.php';
    $sql = 'DELETE FROM books WHERE BookID=' . $_GET['id'];
    $statement =  $connection->prepare($sql);
    $statement->execute();
    header("Location: booklist.php");
?>