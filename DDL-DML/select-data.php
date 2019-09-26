<?php
include "./db-creation/database-connection.php";


if (isset($_GET['text'])){
    //query for search box
    $search_text = $_GET['text'];
    try{
        $stmt = $conn->prepare ("select id , book_name , publisher , isbn , cover from book_record.book_shelf 
where (book_name like '%".$search_text."%' or
publisher like '%".$search_text."%' or
isbn like '%".$search_text."%' or
cover like '%".$search_text."%') and row_status = 1");

        $arr = $stmt->execute();

        $data = $stmt->fetchAll();
    }
    catch (PDOException $e){
        echo "select not execuated" . "<br>" . $e;
    }
}
else
{
    //select for whole data query
    try{
        $stmt = $conn->prepare ("select id , book_name , publisher , isbn , cover from book_record.book_shelf where row_status = 1  order by id DESC ");

        $arr = $stmt->execute();

        $data = $stmt->fetchAll();

    }
    catch (PDOException $e){
        echo "select not execuated" . "<br>" . $e;
    }
}
