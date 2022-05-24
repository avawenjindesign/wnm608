<?php
include "utils/dbUtil.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $image = $_POST['image'];
    $otherImage = $_POST['otherImage'];

    $sql = "insert into products (name,quantity,price,type,image,other_image) values ('$name','$quantity','$price','$type','$image','$otherImage')";
    $conn->query($sql);

    header('location: user-list.php');

    exit();
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
    <link rel="stylesheet" href="css/product-form.css">
</head>

<body>
<?php include './Nav.php' ?>
<!--<div class="w">-->
<!--    <h1 class="title">USER ADMIN</h1>-->
<!--</div>-->
<div class="w user-form">
    <h2>Add Product</h2>

    <form action="product-form.php" method="post">
        <input type="hidden" name="id">
        <div>
            <label for="name">NAME</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="quantity">QUANTITY</label>
            <input type="text" name="quantity" id="quantity">
        </div>
        <div>
            <label for="price">PRICE</label>
            <input type="text" name="price" id="price">
        </div>
        <div>
            <label for="type">TYPE</label>
            <input type="text" name="type" id="type">
        </div>
        <div>
            <label for="image">THUMBNAIL IMAGE</label>
            <input type="text" name="image" id="image">
        </div>
        <div>
            <label for="otherImage">HI-RES IMAGE</label>
            <input type="text" name="otherImage" id="otherImage">
        </div>
        <div>
            <button type="submit">SUBMIT</button>
        </div>
        <div>
            <a href="user-list.php" class="backBtn">Cancel</a>
        </div>
    </form>
</div>
</body>

</html>