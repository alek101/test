<?php 
    require_once 'controller.php';
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
        <h2>Products:</h2>
        <div class="grid">
            <?php
                $products=$controller->getProducts();
                foreach($products as $product)
                {
                    ?>
                    <div class="item">
                        <p class="title"><?php echo $product['title'] ?></p>
                        <img src="<?php echo $product['image'] ?>" 
                        alt="<?php echo $product['title'] ?>. image" class="product_image">
                        <p class="description"><?php echo $product['description'] ?></p>
                    </div>  
                    <?php
                }
            ?>
        </div>
    </div>
    <div class="wrapper">
        <h2>Comments:</h2>
        <?php
            $comments=$controller->getComments();
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
                    </div>
                <?php
            }
        ?>
    </div>
    
</body>
</html>


