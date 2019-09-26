<?php
include "database-connection.php";

try{
    $sql = "create database book_record";
    $conn->exec($sql);
    echo "Database created successfully" . "<br>";
}
catch (PDOException $e){
    echo "connection failure" . "<br>" . $e;
}
