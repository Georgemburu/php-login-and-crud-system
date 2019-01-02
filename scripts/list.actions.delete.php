<?php

if(isset($_GET['delete'])){
    $deleteid = $_GET['delete'];

    require '../db/index.db.php';
    $query = 'DELETE FROM items WHERE id=?';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$query)){
       header('Location: ../dashboard.php?error=dberror');
    }else {
        mysqli_stmt_bind_param($stmt,'s',$deleteid);
        mysqli_stmt_execute($stmt);
        session_start();
        $_SESSION['msg'] = 'item deleted successfully';
        
        header('Location: ../dashboard.php');
    }
    
}else {
    header('Location: ../dashboard.php');
    exit();
}