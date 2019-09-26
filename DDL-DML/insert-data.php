<?php
include "../db-creation/database-connection.php";
session_start();
$bookName = $_POST['bookName'];

$publisher = $_POST['publisher'];

$isbn = $_POST['ISBN'];

$date = date('Y-m-d H:i:s');

$image = $_FILES['image']['name'] . $date ;

$target = "../uploadedPic/".basename($image );

try{

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO book_record.book_shelf (book_name , publisher , isbn , cover)
VALUES ('$bookName' , '$publisher' , '$isbn' , '$image')";

    $insert_status = $conn->exec($sql);

    $_SESSION['msg'] = "success";

    header("location: ../home.php");

}
catch (PDOException $e){
    echo "Record not inserted" . "<br>" . $e;
    $_SESSION['msg'] = "failure";
    header("location: ../home.php");
}

?>
