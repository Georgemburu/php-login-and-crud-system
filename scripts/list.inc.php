<?php
if(isset($_POST)){
    $item = $_POST['list-item'];

    if(empty($item)){
        header('Location: ../dashboard.php?error=emptyfield');
        exit();
    }else{
        require '../db/index.db.php';
        $query = 'INSERT INTO items (item) VALUES (?);';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $query)){
            header('Location: ../dashboard.php?error=dberror');
        exit();
        }else {
            mysqli_stmt_bind_param($stmt,'s',$item);
            mysqli_stmt_execute($stmt);  
            header('Location: ../dashboard.php?saved=success');
            exit();
        }
    }
}