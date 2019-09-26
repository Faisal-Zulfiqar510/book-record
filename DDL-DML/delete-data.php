<?php
include "../db-creation/database-connection.php";

if(isset($_GET['delete'])){
    $ide = $_GET['delete'];
    try{
        $sql = "UPDATE book_record.book_shelf SET row_status = 0 WHERE id = $ide";
        $conn->exec($sql);
        header("location:../table-for-books.php");
    }
    catch (PDOException $e){
        echo "record not deleted" . "<br>" . $e;

    }

}
?>