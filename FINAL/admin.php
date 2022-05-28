<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
<?php include './Nav.php' ?>
<div class="w admin">
    <form action="user-list.php" method="get">
        <div>
            <label for="adminId">ADMIN ID</label>
            <input type="text" id="adminId" placeholder="Your Admin Id">
        </div>
        <div>
            <label for="email">EMAIL</label>
            <input type="email" id="email" placeholder="Your Email">
        </div>
        <div>
            <label for="password">PASSWORD</label>
            <input type="password" id="password" placeholder="Your Password">
        </div>
        <div>
            <button type="submit">SIGN IN</button>
        </div>
    </form>
</div>
</body>

</html>