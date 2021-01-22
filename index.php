<?php 
    require_once 'controller.php';
    // var_dump($controller->getProducts());
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
        <?php
            $products=$controller->getProducts();

            foreach($products as $product)
            {
                ?>
                  <div class="item"></div>  
                <?php
            }
        ?>
        
    </div>
</body>
</html>


