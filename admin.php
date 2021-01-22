<?php 
    require_once 'controller.php';
    if(isset($_PUT["id"]) and $_SERVER['REQUEST_METHOD']==='PUT') echo json_encode($_PUT["id"]);
    echo json_encode($_SERVER['REQUEST_METHOD']);

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
                        <form action="admin.php?" method="PUT">
                            <input type="text" name="id" hidden value="<?=$comment['id']?>">
                            <button type="submit">Approve</button>
                        </form>
                    </div>
                <?php
            }
        ?>
    </div>
    
</body>
</html>


