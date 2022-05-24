<?php
include_once 'utils/dbUtil.php';
$carts = json_decode(file_get_contents("./json/carts.json"));

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = getProduct($id);
}

function getProduct($id)
{
    global $conn;
    $product = mysqli_fetch_assoc($conn->query("select * from products where id = $id"));
    return $product;
}


if (isset($_GET['type'])) {
    if ($_GET['type'] == 'addCarts') {
        $number = $_GET['number'];
        $productId = $_GET['productId'];

        array_push($carts, [
            'number' => $number,
            'product' => getProduct($productId)
        ]);
        print_r($carts);
        file_put_contents("./json/carts.json", json_encode($carts));
        header('location: carts.php');
        exit();
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Detail</title>
    <link rel="stylesheet" href="./css/product-detail.css">
</head>
<body>
<?php include './Nav.php' ?>
<div class="w product-detail">
    <div class="cover">
        <img src="<?php echo $product['image'] ?>" id="cover" alt="cover" class="cover-big" width="400" height="545">
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
            <span id="number">1</span>
            <span class="number-btn" id="plus-btn">+</span>
        </p>
        <p>Price: $<?php echo $product['price'] ?></p>
        <div>
            <button class="add-cart-btn">ADD TO ORDER</button>
            <a href="product.php">
                <button class="back-btn">BACK TO PRODUCT</button>
            </a>
        </div>
    </div>
</div>
<script>
    window.onload = () => {
        let number = 1;
        let color = 'Graphite/Graphite';
        let size = 'Size A - Small';
        let productId = <?php echo $_GET['id']?>;
        let image = '<?php echo $product['image']?>';

        document.querySelector(".add-cart-btn").onclick = () => {
            window.location = `product-detail.php?type=addCarts&color=${color}&size=${size}&number=${number}&productId=${productId}&image=${image}`;
        };

        document.getElementById("sub-btn").onclick = () => {
            number = Math.max(1, number - 1);
            document.getElementById("number").innerText = `${number}`;
        };
        document.getElementById("plus-btn").onclick = () => {
            number++;
            document.getElementById("number").innerText = `${number}`;
        };
        document.querySelectorAll(".cover-small img").forEach((e) => {
            e.onclick = () => {
                document.getElementById("cover").attributes.src.value = e.attributes.getNamedItem("src").value
            }
        });
    }
</script>
</body>
</html>