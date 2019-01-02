<?php

if(isset($_POST['login-btn'])){

    $username = $_POST['username'];
    $password = $_POST['password'];


    if(empty($username)||empty($password)){
        header('Location: ../login.php?error=emptyfields ');
        exit();
    }else {
        require '../db/index.db.php';
        $query = 'SELECT * FROM users WHERE username=?';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $query)){
            header('Location: ../login.php?error=preparingstmt ');
            exit();
        }else {
            mysqli_stmt_bind_param($stmt,'s',$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            
            if($row == false){
                header('Location: ../login.php?error=incorrectuuid');
                die();
            }else if($row==true){
                $checkPassword = password_verify($password, $row['password']);
                if($checkPassword==false){
                    header('Location: ../login.php?error=incorrectpwd&username='.$username);
                    die();
                }if($checkPassword == true){
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header('Location: ../dashboard.php?login=success');
                }
            }
        }


    }
}