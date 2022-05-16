<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
<?php include './Nav.php' ?>
<div class="w contact">
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
            <label for="email">Email</label>
            <input type="email" placeholder="Your e-mail address">
        </div>
        <div>
            <label for="country">Country</label>
            <select>
                <option>America</option>
                <option>China</option>
                <option>Russia</option>
            </select>
        </div>
        <div>
            <label for="subject">Subject</label>
            <textarea rows="10" placeholder="Subject"></textarea>
        </div>
        <div>
            <button>Submit</button>
        </div>
    </form>
</div>
</body>

</html>