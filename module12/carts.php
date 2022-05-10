<?php
$carts = json_decode(file_get_contents("./json/carts.json"));
if (isset($_GET['type'])) {
    $id = $_GET['id'];
    array_splice($carts, $id, 1);
    file_put_contents("./json/carts.json", json_encode($carts));
}
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
    $yf = false;
    $index = 0;
    foreach ($carts as $cart) {
        if ($cart->product->id == 6 || $cart->product->id == 7) {
            $yf = true;
        }
        ?>
        <div class="carts-item">
            <div class="cover">
                <img src="<?php echo $cart->product->image ?>" alt="cover">
            </div>
            <div class="info">
                <p class="title"><?php echo $cart->product->name ?></p>
                <?php
                if ($cart->product->id == 1) {
                    ?>
                    <p>FRAME/BOSE <?php echo $cart->color ?></p>
                    <p>Size: <?php echo $cart->size ?></p>
                    <?php
                }
                ?>

            </div>
            <div class="number">
                <span>QUANTITY: </span>
                <span class="sub-btn">-</span>
                <span class="number" data-price="<?php echo $cart->product->price ?>"
                      data-number="<?php echo $cart->number ?>"><?php echo $cart->number ?></span>
                <span class="plus-btn">+</span>
                <span class="price">Price: $<?php echo $cart->product->price ?></span>
            </div>
            <div style="display: flex;flex-direction: column;justify-content: center;padding: 0 20px">
                <p>
                    <img src="./images/icons/edit.png" alt="edit" width="20">
                    <a href="carts.php?type=delete&id=<?php echo $index ?>">
                        <img src="./images/icons/delete.png" alt="delete" width="20">
                    </a>
                </p>
            </div>
        </div>
        <?php
        $index++;
    }
    ?>

</div>
<div class="w" style="height: 200px;">
    <div class="carts-total">
        <p>SUBTOTAL:$<span id="subtotal"></span></p>
        <p>SALES TAX:$<span id="tax"></span></p>
        <p>SHIPPING:$<span id="shipping"></span></p>
        <p>TOTAL:$<span id="total"></span></p>
    </div>
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
                const n = Math.max(0, number.innerHTML - 1);
                number.innerHTML = `${n}`;
                number.attributes['data-number'].value = n;
                getAmount();
            }

        });
        document.querySelectorAll('.plus-btn').forEach(e => {
            const number = e.parentElement.querySelector(".number");
            e.onclick = () => {
                const n = `${number.innerHTML - 0 + 1}`;
                number.innerHTML = n;
                number.attributes['data-number'].value = n;
                getAmount();
            }
        });

        function getAmount() {
            let amount = 0;
            document.querySelectorAll(".carts-item .number .number").forEach(e => {
                let n = e.attributes['data-number'].value;
                let p = e.attributes['data-price'].value;
                amount += n * p;
            });
            const shipping = amount * 0.09375;
            const tax = '<?php echo $yf ? '300' : '0'?>';
            const total = parseInt(amount + shipping + parseInt(tax));

            document.getElementById("subtotal").innerText = amount;
            document.getElementById("tax").innerText = tax;
            document.getElementById("shipping").innerText = `${parseInt(shipping)}`;
            document.getElementById("total").innerText = `${total}`

        }

        getAmount()
    }
</script>

</body>
</html>