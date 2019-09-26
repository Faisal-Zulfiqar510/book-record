<?php
session_start();
include "../db-creation/database-connection.php";
include "db-creation/database-connection.php";
if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    try{

        $stmt = $conn->prepare ("select id , book_name , publisher , isbn , cover from book_record.book_shelf where id = $id");

        $arr = $stmt->execute();
        $data = $stmt->fetchAll();
        $_SESSION['status'] = "yes";


    }
    catch (PDOException $e)
    {
        echo "data not selected for update" . "<br>" . $e;
    }
}

if (isset($_POST['update'])){

    $id_row = $_POST['id_row'];

    $bookName = $_POST['bookName'];

    $publisher = $_POST['publisher'];

    $isbn = $_POST['ISBN'];
    $date = date('Y-m-d H:i:s');
    $image = $_FILES['image']['name'] . $date;
    $img = $_FILES['image']['name'];
    $target = "../uploadedPic/".basename( $image);

    try{
        if(isset($img) and $img !="") {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

            $sql = "UPDATE book_record.book_shelf 
SET book_name = '$bookName' , publisher = '$publisher' , isbn = '$isbn' , cover = '$image'
Where id = $id_row";
            echo "if";
            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();

            header("location:../table-for-books.php");
        }
        else{
            $sql = "UPDATE book_record.book_shelf 
SET book_name = '$bookName' , publisher = '$publisher' , isbn = '$isbn' 
Where id = $id_row";

            // Prepare statement
            $stmt = $conn->prepare($sql);
            echo "in else";

            // execute the query
            $stmt->execute();
            header("location:../table-for-books.php");
        }
        //echo "Update Successfully" . "<br>";
    }
    catch(PDOException $e){
        //echo "Not Updated " . "<br>" . $e;

    }
}
?>