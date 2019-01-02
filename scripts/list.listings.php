<?php
 require 'db/index.db.php';
 $query = 'SELECT * FROM items;';
 $stmt = mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt, $query)){
     echo 'error with db';
 }else {
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
 }
?>