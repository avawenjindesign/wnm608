<?php
$carts = json_decode(file_get_contents("./json/carts.json"));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CARTS</title>
    <link rel="stylesheet" href="./css/carts.css">
</head>
<body>
<?php include 'Nav.php' ?>
<div class="w carts-wrap">
    <?php
    foreach ($carts as $cart) {
        ?>
        <div class="carts-item">
            <div class="cover">
                <img src="<?php echo $cart->product->image?>" alt="cover">
            </div>
            <div class="info">
                <p class="title"><?php echo $cart->product->name?></p>
                <p>FRAME/BOSE <?php echo $cart->color?></p>
                <p>Size: <?php echo $cart->size?></p>
            </div>
            <div class="number">
                <span>QUANTITY: </span>
                <span class="sub-btn">-</span>
                <span class="number"><?php echo $cart->number?></span>
                <span class="plus-btn">+</span>
                <span class="price">Price: $<?php echo $cart->product->price?></span>
            </div>
        </div>
        <?php
    }
    ?>

</div>
<div class="w">
    <a href="./payment.php">
        <button type="button" class="checkout-btn">CHECK OUT</button>
    </a>
</div>

<script>
    window.onload = () => {
        document.querySelectorAll('.sub-btn').forEach(e => {
            const number = e.parentElement.querySelector(".number");
            e.onclick = () => {
                number.innerHTML = `${Math.max(1, number.innerHTML - 1)}`;
            }
        });
        document.querySelectorAll('.plus-btn').forEach(e => {
            const number = e.parentElement.querySelector(".number");
            e.onclick = () => {
                number.innerHTML = `${number.innerHTML - 0 + 1}`;
            }
        })
    }
</script>

</body>
</html>