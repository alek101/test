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
    <div class="wrapper">
        <h3>Post New Comment</h3>
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
            
            <button type="submit" id="postCommentButton">Post Comment</button>
        </form>
    </div>

    <script>
        document.querySelector('#postCommentButton').addEventListener('click',(e)=>{
            e.preventDefault();
            const url='createComment.php';
            const parametars=new URLSearchParams();
            parametars.append('name',document.querySelector('#name').value);
            parametars.append('email',document.querySelector('#email').value);
            parametars.append('comment',document.querySelector('#comment').value);
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
                    location.reload();
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


