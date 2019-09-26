<?php
include "database-connection.php";

try{
    $sql = "CREATE TABLE book_record.book_shelf (
id INT(3) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
book_name VARCHAR (20) NOT NULL ,
publisher VARCHAR (20) NOT NULL ,
isbn VARCHAR (15),
cover VARCHAR (50)
)";
    $conn->exec($sql);
    echo "Table Created!" . "<br>";
}
catch(PDOException $e){
    echo "Table not Created" . "<br>" . $e;
}
