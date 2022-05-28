<?php
include "utils/dbUtil.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $conn->query("select * from products where id = $id")->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $image = $_POST['image'];
    $otherImage = $_POST['otherImage'];

    $sql = "update products set name = '$name' ,quantity='$quantity',price='$price',type='$type',image='$image',other_image='$otherImage' where id = $id";
    $conn->query($sql);

    echo $sql;
    header('location: user-list.php');
it();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERLIST ADMIN</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product-update.css">
</head>

<body>
<?php include './Nav.php' ?>
<!--<div class="w">-->
<!--    <h1 class="title">USER ADMIN</h1>-->
<!--</div>-->
<div class="w" style="display: flex">
    <div class="product-detail" style="margin-right: 10px;border-radius: 5px">
        <div class="cover">
            <img src="<?php echo $product['image'] ?>" id="cover" alt="cover" class="cover-big" width="200"
                 height="300">
            <div class="cover-small">
                <?php
                $smallImages = explode(';', $product['other_image']);
                foreach ($smallImages as $image) {
                    ?>
                    <img src="<?php echo $image ?>" alt="cover-small" height="100">
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="info">
            <h3><?php echo $product['name'] ?></h3>
            <p>
                <span>QUANTITY: </span>
                <span class="number-btn" id="sub-btn">-</span>
                <span id="number"><?php echo $product['quantity'] ?></span>
                <span class="number-btn" id="plus-btn">+</span>
            </p>
            <p>Price: $<?php echo $product['price'] ?></p>
        </div>
    </div>
    <div class="user-form" style="flex: 1">
        <h2>Edit Product</h2>

        <form action="product-update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
            <div>
                <label for="name">NAME</label>
                <input type="text" name="name" id="name" value="<?php echo $product['name'] ?>">
            </div>
            <div>
                <label for="quantity">QUANTITY</label>
                <input type="text" name="quantity" id="quantity" value="<?php echo $product['quantity'] ?>">
            </div>
            <div>
                <label for="price">PRICE</label>
                <input type="text" name="price" id="price" value="<?php echo $product['price'] ?>">
            </div>
            <div>
                <label for="type">TYPE</label>
                <input type="text" name="type" id="type" value="<?php echo $product['type'] ?>">
            </div>
            <div>
                <label for="image">THUMBNAIL IMAGE</label>
                <input type="text" name="image" id="image" value="<?php echo $product['image'] ?>">
            </div>
            <div>
                <label for="otherImage">HI-RES IMAGE</label>
                <input type="text" name="otherImage" id="otherImage" value="<?php echo $product['other_image'] ?>">
            </div>
            <div>
                <button type="submit">SUBMIT</button>
            </div>
            <div>
                <a href="user-list.php" class="backBtn">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script>
    window.onload = () => {
        document.querySelectorAll(".cover-small img").forEach((e) => {
            e.onclick = () => {
                document.getElementById("cover").attributes.src.value = e.attributes.getNamedItem("src").value
            }
        });
    }
</script>
</body>

</html>