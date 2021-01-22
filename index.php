<?php 
    require_once 'mainPageController.php';
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
        <?php 
            
            if($_SESSION['isAuth'])
            {
                ?>
                    <a href="admin.php">Admin Page</a>
                    <form action="" method="post" class="flex-row">
                        <input type="hidden" name="logout" value="true">
                        <button type="submit" class="loginButton">Logout</button>
                    </form>
                <?php
            }
            else
            {
                ?>
                    <form action="" method="post" class="flex-row">
                        <p class="flex-row">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required>
                        </p>
                        <p class="flex-row">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </p>
                        <button type="submit" class="loginButton">Login</button>
                    </form>
                <?php
            }
        ?>    
    </div>
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
    <div class="wrapper">
        <h3>Post New Comment</h3>
        <p id="message"></p>
        <form class="new_comment_form" method='post' action="">
            <p>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </p>
            <p>
                <textarea type="text" id="comment" name="comment" 
                placeholder="Post your's comment here" required></textarea>  
            </p>
            
            <button type="submit" id="postCommentButton" class="action-button">Post Comment</button>
        </form>
    </div>
</body>
</html>


