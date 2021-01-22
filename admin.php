<?php 
    require_once 'controller.php';
    if(isset($_POST["id"]) and $_POST['method']=='PUT') $controller->approveComment($_POST["id"]);
    if(isset($_POST["id"]) and $_POST['method']=="DELETE") $controller->deleteComment($_POST["id"]);

    session_start();
    if(!isset($_SESSION['isAuth'])) die();
    if(!$_SESSION['isAuth']) die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citrus Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <a href="index.php">Back</a>
    </div>
    <div class="wrapper">
        <h2>Comments that are waiting for approvement:</h2>
        <?php
            $comments=$controller->getComments("0");
            foreach($comments as $comment)
            {
                ?>
                    <div class="comment">
                        <p class="comment-name">
                            <?php
                                echo $comment['name']
                            ?>
                        </p>
                        <p class="comment-body">
                            <?php
                                echo $comment['comment']
                            ?>
                        </p>
                        <div class="admin-forms">
                            <form action="admin.php" method="POST">
                                <input type="text" name="id" hidden value="<?=$comment['id']?>">
                                <input type="text" name="method" hidden value="PUT">
                                <button type="submit" class="action-button">Approve</button>
                            </form>
                            <form action="admin.php" method="POST">
                                <input type="text" name="id" hidden value="<?=$comment['id']?>">
                                <input type="text" name="method" hidden value="DELETE">
                                <button type="submit" class="action-button">Delete</button>
                            </form>
                        </div>
                        
                    </div>
                <?php
            }
        ?>
    </div>

    
</body>
</html>


