<?php
include "./html-design-files/include-files.php";
/*include "toast.php";*/

$servername = 'localhost';
$username = 'root';
$password = 'coeus123';
$dbname = 'book_record';

try{
    $conn = new PDO("mysql:host = $servername; dbname = $dbname" , $username , $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    //echo "CONNECTION";

}
catch(PDOException $e){

    echo "Connection Failure" . "<br>".$e;

}

