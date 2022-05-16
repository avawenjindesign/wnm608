<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link rel="stylesheet" href="css/payment.css">
</head>
<body>
<?php include 'Nav.php' ?>
<div class="w contact">
    <h1>Payment Information</h1>
    <form action="#" method="post">
        <div>
            <label for="firstName">First Name</label>
            <input type="text" placeholder="Your First Name">
        </div>
        <div>
            <label for="lastName">Last Name</label>
            <input type="text" placeholder="Your Last Name">
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" placeholder="Your address">
        </div>
        <div>
            <label for="address">Date</label>
            <input type="date" placeholder="Your Date">
        </div>
        <div>
            <button>Submit</button>
        </div>
    </form>
</div>
</body>
</html>