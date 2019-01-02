<?php
require 'includes/header.php';
?>
<main>
    <div class="notice-div">
        <?php
        if(isset($_GET['error'])){
        if($_GET['error']=='emptyfields'){
            echo 'Fields Should not be Empty';
        }else if($_GET['error']=='passwordsnotmatch'){
            echo 'Passwords do not match';
        }else if($_GET['error']=='invalidemail'){
            echo 'Invalid Email';
        }else if($_GET['error']=='invalidusername'){
            echo 'invalid Username';
        }else if($_GET['error']=='invalidusernameandemail'){
            echo 'invalid Username and Password';
        }else if($_GET['error']=='preparingstmt'){
            echo 'there was an error with the server. Please try again';
        }
    }
        ?>
    <div>
<div class="signup-div">
    <form method="post" action="scripts/signup.inc.php">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="password2" placeholder="retype password">
        <input type="submit" name="signup-btn" value="sign UP">
    </form>
</div>
</main>
<?php
require 'includes/footer.php';
?>