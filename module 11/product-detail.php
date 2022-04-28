<?php
$products = json_decode(file_get_contents("./json/products.json"));
$carts = json_decode(file_get_contents("./json/carts.json"));
$product = [];
if (isset($_GET['id'])) {
    $product = $products[$_GET['id'] - 1];
}
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'addCarts') {
        $color = $_GET['color'];
        $size = $_GET['size'];
        $number = $_GET['number'];
        $productId = $_GET['productId'];
        $product = $products[$productId - 1];
        $product->image = $_GET['image'];

        array_push($carts, [
            'color' => $color,
            'size' => $size,
            'number' => $number,
            'product' => $product
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
        <img src="<?php echo $product->image ?>" id="cover" alt="cover" class="cover-big" width="400" height="545">
        <div class="cover-small">
            <?php
            foreach ($product->images as $image) {
                ?>
                <img src="<?php echo $image ?>" alt="cover-small" height="100">
                <?php
            }
            ?>
        </div>
    </div>
    <div class="info">
        <h3><?php echo $product->name ?></h3>
        <?php
        if ($_GET['id'] == 1) {
            ?>
            <div class="info-type">
                <p class="title">1. FRAME/BASE</p>

                <div style="position: relative;display: flex">
                    <div class="select" style="left: -99px">√</div>
                    <img src="images/c1.jpg" alt="c" data-index="0" height="80" width="80" class="cs"
                         data-value="Graphite">
                    <img src="images/c2.jpg" alt="c" data-index="1" height="80" width="80" class="cs"
                         data-value="Mineral">
                    <img src="images/c3.jpg" alt="c" data-index="2" height="80" width="80" class="cs"
                         data-value="Graphite">
                </div>
            </div>
            <div class="info-type">
                <p class="title">1. FRAME/BASE</p>
                <div class="size-select">
                    <div data-index="0" class="active">Size A - Small</div>
                    <div data-index="1">Size B - Medium</div>
                    <div data-index="2">Size C - Large</div>
                </div>
            </div>
        <?php } ?>
        <p>
            <span>QUANTITY: </span>
            <span class="number-btn" id="sub-btn">-</span>
            <span id="number">1</span>
            <span class="number-btn" id="plus-btn">+</span>
        </p>
        <p>Price: $<?php echo $product->price ?></p>
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
        let image = '<?php echo $product->image?>';

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
        document.querySelectorAll(".info-type .cs").forEach(e => {
            const colors = ['Graphite/Graphite', 'Mineral/Stain Aluminum', 'Graphite/Polished Aluminum'];
            const images = ['./images/12.jpg', './images/11.jpg', './images/13.jpg'];
            let index = 0;
            e.onclick = () => {
                index = e.attributes['data-index'].value;
                document.querySelector(".info-type .select").style.left = (index * 80) + 'px';
                color = colors[index];
                document.getElementById("cover").attributes.src.value = images[index];
                image = images[index]
            }
        });

        document.querySelectorAll(".size-select div").forEach(e => {
            const sizes = ['Size A - Small', 'Size B - Medium', 'Size C - Large'];
            let index = 0;
            e.onclick = () => {
                e.parentElement.querySelectorAll("div").forEach(e2 => {
                    e2.className = ""
                });
                e.className = "active";
                index = e.attributes['data-index'].value;
                size = sizes[index];
            }
        })
    }
</script>
</body>
</html>