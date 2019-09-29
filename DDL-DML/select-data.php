<?php
include "./db-creation/database-connection.php";



$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$search_text = $_GET['search_text'];
try {
    $stmt = $conn->prepare("select   id , book_name , publisher , isbn , cover from book_record.book_shelf 
where (book_name like '%" . $search_text . "%' or
publisher like '%" . $search_text . "%') and row_status = 1
 order by id DESC LIMIT $start , $limit ");

    $arr = $stmt->execute();  //to execute query
    $data = $stmt->fetchAll();  // to fetch all data from database


    //to get the total of record
    $stmt1 = $conn->prepare("select count(*) as total from book_record.book_shelf 
where (book_name like '%" . $search_text . "%' or
publisher like '%" . $search_text . "%') and row_status = 1 ");

    $stmt1->execute();
    $count = $stmt1->fetchColumn();   //to fetch the number of rows from table

    $pages = ceil($count / $limit); //to get the number of pages

} catch (PDOException $e) {
    echo "select not executed" . "<br>" . $e;
}
