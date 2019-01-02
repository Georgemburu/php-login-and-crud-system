<?php
require 'includes/header.php';
?>
<main>
    <div class="notice div">
        <?php
        if(isset($_GET['error'])){
            if($_GET['error']=='emptyfields'){
            echo 'Fields Should not be Empty';
        }else if($_GET['error']=='preparingstmt'){
            echo 'There was an error with the database, please try again';
        }else if($_GET['error']=='incorrectuuid'){
            echo 'Incorrect Credentials';
        }else if($_GET['error']=='incorrectpwd'){
            echo 'Incorrect credentials. Did you forget your password?';
        }
    }
        if(isset($_GET['logout'])){
            if($_GET['logout']== 'success') {
                echo 'logout successful';
            }
        }
       
        ?>
        
    <div>
<div class="login-div">
    <form method="post" action="scripts/login.inc.php">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="login-btn" value="Login">
    </form>
</div>
</main>
<?php
require 'includes/footer.php';
?>