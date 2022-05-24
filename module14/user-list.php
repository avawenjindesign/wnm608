<?php
$str = file_get_contents("./json/users.json");
$usersList = json_decode($str);
include_once 'utils/dbUtil.php';

$products = mysqli_fetch_all($conn->query("select * from products"))

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERLIST ADMIN</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/user-list.css">
</head>

<body>
<?php include './Nav.php' ?>
<div class="w">
    <h1 class="title">USER ADMIN</h1>
</div>
<div class="w user-list">
    <h2>USER LIST</h2>
    <ul class="users">
        <?php
        foreach ($usersList as $user) {
            ?>
            <li>
                <a href="user-form.php?id=<?php echo $user->id ?>"><?php echo $user->name ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
<br>
<div class="w user-list">
    <h2 style="display: flex;justify-content: space-between">
        <span>Product LIST</span>
        <a href="product-form.php" style="color: #333;text-decoration: none;font-size: 16px">Add More Product</a>
    </h2>
    <ul class="users">
        <?php
        foreach ($products as $product) {
            ?>
            <li>
                <a href="product-update.php?id=<?php echo $product[0] ?>"><?php echo $product[6] ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
<br>
</body>

</html>