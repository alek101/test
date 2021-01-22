<?php 
    require_once 'controller.php';
    if(isset($_GET["id"]) and $_GET['method']=='PUT') $controller->approveComment($_GET["id"]);
    if(isset($_GET["id"]) and $_GET['method']=="DELETE") $controller->deleteComment($_GET["id"]);

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
    <div class="wrapper">
        <h2>Comments:</h2>
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
                            <form action="admin.php?" method="GET">
                                <input type="text" name="id" hidden value="<?=$comment['id']?>">
                                <input type="text" name="method" hidden value="PUT">
                                <button type="submit">Approve</button>
                            </form>
                            <form action="admin.php?" method="GET">
                                <input type="text" name="id" hidden value="<?=$comment['id']?>">
                                <input type="text" name="method" hidden value="DELETE">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                        
                    </div>
                <?php
            }
        ?>
    </div>
    
</body>
</html>


