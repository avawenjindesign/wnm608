<?php
$file_get_contents = file_get_contents("./json/products.json");

$products = json_decode($file_get_contents);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
<?php include './Nav.php' ?>
<div class="product w">
    <?php
    foreach ($products as $item) {
        ?>
        <div class="product-item">
            <a href="product-detail.php?id=<?php echo $item->id ?>" class="image"
               style="background-image: url(<?php echo $item->image ?>);">
            </a>
            <div class="info">
                <p><?php echo $item->name ?></p>
                <p>$<?php echo $item->price ?></p>
                <p>
                    <a href="product-detail.php?id=<?php echo $item->id ?>">
                        <button class="detail-btn">DETAIL</button>
                    </a>
                </p>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>