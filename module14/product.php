<?php
$file_get_contents = file_get_contents("./json/products.json");

$products = json_decode($file_get_contents);

include_once 'utils/dbUtil.php';

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $type = $_GET['type'];
    if ($type === 'ALL') {
        $type = '';
    }
    $order = $_GET['order'];
} else {
    $name = '';
    $type = '';
    $order = 'desc';
}

$products = mysqli_fetch_all($conn->query("select * from products where name like '%$name%' and type like '%$type%' order by price $order"));

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
        <button class="detail-btn" style="cursor: pointer" id="searchBtn">Search</button>
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
        <div class="product-item">
            <a href="product-detail.php?id=<?php echo $item[0] ?>" class="image"
               style="background-image: url(<?php echo $item[1] ?>);">
            </a>
            <div class="info">
                <p><?php echo $item[6] ?></p>
                <p>$<?php echo $item[3] ?></p>
                <p>
                    <a href="product-detail.php?id=<?php echo $item[0] ?>">
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
    const query = {
        name: '',
        order: 'desc',
        type: ''
    };

    document.getElementById("search").oninput = function () {
        query.name = this.value
    };

    document.getElementById("orderBy").onchange = function () {
        query.order = this.value
    };

    document.querySelectorAll(".categories>div").forEach(element => {
        element.onclick = function () {
            query.type = this.innerText;
            changeSelected();
        }
    });

    function changeSelected() {
        document.querySelectorAll(".categories>div").forEach(element => {
            if (element.innerText === query.type) {
                element.className = 'active'
            } else {
                element.className = '';
            }
        })
    }

    document.getElementById("searchBtn").onclick = function () {
        const url = `product.php?name=${query.name}&type=${query.type}&order=${query.order}`;
        location.assign(url);
    }

</script>
</body>
</html>