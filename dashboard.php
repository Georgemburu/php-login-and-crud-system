<?php require 'includes/header.php'?>
<main style="padding:30px;">
    <div>
        <?php
        session_start();
        $user = $_SESSION['username'];
        if($_SESSION['username']){
            echo 'welcome '.$user;
        }else {
            header('Location: login.php');
        }
        ?>
    </div>
    <div class="list-input-div">
        <h4>Add items to list</h4>
        <form method="post" action="scripts/list.inc.php">
        <input type="text"name="list-item" >
        <input type="submit" name="list-btn" value="ADD">
        
        </form>
    </div>
    <div class="list-display-div">
            <div class="msg-display-div"> 
                <?php
                // session_start();
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];

                    unset($_SESSION['msg']);
                   
                }
                ?>
            </div>
        <table>
            <thead>
                <tr>
                <th>Item</th>
                <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php require 'scripts/list.listings.php'?>
                <?php
                while($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                <td><?php echo $row['item']?><td>
                <td><a href="scripts/list.actions.edit.php?edit=<?=$row['id']?>" name="edit">Edit</a><td>
                <td><a  href="scripts/list.actions.delete.php?delete=<?= $row['id']?>" name="delete">Delete</a><td><br>
                </tr>
                <?php endwhile;?>
                
            </tbody>
        </table>
    </div>
</main>

<?php require 'includes/footer.php'?>