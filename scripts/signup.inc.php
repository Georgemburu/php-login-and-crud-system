<?php

if(isset($_POST['signup-btn'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(empty($firstname)||empty($lastname)||empty($email)||empty($username)||empty($password)||empty($password2)){
        header('Location: ../signup.php?error=emptyfields ');
        exit();
    }else if($password !== $password2){
        header('Location: ../signup.php?error=passwordsnotmatch&firstname='.$firstname.'&lastname='.$lastname.'&email='.$email.'&username='.$username);
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location: ../signup.php?error=invalidemail&firstname='.$firstname.'&lastname='.$lastname.'&username='.$username);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header('Location: ../signup.php?error=invalidusername&firstname='.$firstname.'&lastname='.$lastname.'&email='.$email);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location: ../signup.php?error=invalidusernameandemail&firstname='.$firstname.'&lastname='.$lastname);
        exit();
    }
    else {
        require '../db/index.db.php';

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = 'INSERT INTO users (firstname,lastname,email,username,password) VALUES (?,?,?,?,?);';

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$query)){
            header('Location: ../signup.php?error=preparingstmt ');
            exit();
        }else {
           mysqli_stmt_bind_param($stmt,'sssss',$firstname,$lastname,$email,$username,$hashed_password);
           mysqli_stmt_execute($stmt);
            header('Location: ../login.php?signup=success');
        }

        
    }
}