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
    <div class="login">
        <?php 
            session_start();
            if(!isset($_SESSION['isAuth'])) $_SESSION['isAuth']=false;
            if(isset($_POST["username"]) and isset($_POST['password']))
            {
                if($controller->checkCredentials(
                    $_POST["username"],$_POST["password"])
                    ) 
                    $_SESSION['isAuth']=true;
            } 
            if(isset($_POST['logout']))
            {
                $_SESSION['isAuth']=false;
            }
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
        <form class="new_comment_form">
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

    <script>
        const name=document.querySelector('#name');
        const email=document.querySelector('#email');
        const comment=document.querySelector('#comment');
        document.querySelector('#postCommentButton').addEventListener('click',(e)=>{
            e.preventDefault();
            const url='createComment.php';
            const parametars=new URLSearchParams();
            parametars.append('name',name.value);
            parametars.append('email',email.value);
            parametars.append('comment',comment.value);
            fetch(url,
            {
                method: 'POST',
                ContentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                body: parametars
            })
            .then(res=>res.json())
            .then(res=>{
                if(res=="Added comment")
                {
                    document.querySelector('#message').innerHTML="Your's comment waits for approvement!";
                    name.value="";
                    email.value="";
                    comment.value=null;
                }
                if(res=="Error")
                {
                    alert("Comment wasn't added!");
                }
            })
            .catch(err=>console.log(err));
        })
    </script>
</body>
</html>


