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
<div class="w">
    <div class="search">
        <img src="./images/img.png" alt="icon">
        <input type="text" placeholder="START TYPE TO SEARCH" id="search">
    </div>
    <div class="filter">
        <select class="orderBy" id="orderBy">
            <option>SORT BY</option>
            <option value="desc">price:from high to low</option>
            <option value="asc">price:from low to high</option>
        </select>
        <div class="categories">
            <div class="active">ALL</div>
            <div>CHAIRS</div>
            <div>ACCESSORY</div>
            <div>TABLES</div>
        </div>
    </div>
</div>
<div class="product w">
    <?php
    foreach ($products as $item) {
        ?>
        <div class="product-item" data-type="<?php echo $item->type ?>" data-name="<?php echo $item->name ?>"
             data-price="<?php echo $item->price ?>">
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
<script>
    document.querySelectorAll(".categories div").forEach(e => {
        e.onclick = function () {
            document.querySelectorAll(".categories div").forEach(e => {
                e.className = ''
            })
            e.className = 'active'
            const category = e.innerHTML;
            document.querySelectorAll(".product-item").forEach(e => {
                if (category === 'ALL') {
                    e.style.display = 'block'
                } else {
                    if (category === e.attributes.getNamedItem('data-type').value) {
                        e.style.display = 'block'
                    } else {
                        e.style.display = 'none'
                    }
                }
            })
        }
    });

    document.querySelector("#search").oninput = function () {
        console.log(this.value)
        document.querySelectorAll(".product-item").forEach(e => {
            if (e.attributes.getNamedItem('data-name').value.toUpperCase().match(this.value.toUpperCase())) {
                e.style.display = 'block'
            } else {
                e.style.display = 'none'
            }
        })
    }

    document.querySelector("#orderBy").onchange = function () {
        const products = []

        document.querySelectorAll(".product-item").forEach(e => {
            products.push({
                price: parseInt(e.attributes.getNamedItem('data-price').value),
                element: e
            })
        })

        document.querySelector(".product").innerHTML = ''

        if (this.value === 'desc') {
            products.sort((a,b)=>{
                return b.price- a.price
            }).forEach(({element})=>{
                document.querySelector(".product").appendChild(element)
            })
        } else if (this.value === 'asc') {
            products.sort((b,a)=>{
                return b.price- a.price
            }).forEach(({element})=>{
                document.querySelector(".product").appendChild(element)
            })
        }else{
            products.forEach(({element})=>{
                document.querySelector(".product").appendChild(element)
            })
        }
    }

</script>
</body>
</html>