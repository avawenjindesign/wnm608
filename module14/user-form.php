<?php
$str = file_get_contents("./json/users.json");
$usersList = json_decode($str);
$formUser = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($usersList as $user) {
        if ($user->id == $id) {
            $formUser = $user;
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $occupation = $_POST['occupation'];
    $email = $_POST['email'];
    $jsonList = [];
    foreach ($usersList as $user) {
        if ($user->id == $id) {
            array_push($jsonList, [
                'id' => $id,
                'name' => $name,
                'occupation' => $occupation,
                'email' => $email
            ]);
        } else {
            array_push($jsonList, $user);
        }
    }
    file_put_contents("./json/users.json", json_encode($jsonList));
    header('location: user-list.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERLIST ADMIN</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/user-form.css">
</head>

<body>
<?php include './Nav.php' ?>
<div class="w">
    <h1 class="title">USER ADMIN</h1>
</div>
<div class="w user-form">
    <h2>USER LIST</h2>

    <form action="user-form.php" method="post">
        <input type="hidden" name="id" value="<?php echo $formUser->id ?>">
        <div>
            <label for="name">NAME</label>
            <input type="text" name="name" id="name" placeholder="<?php echo $formUser->name ?>"
                   value="<?php echo $formUser->name ?>">
        </div>
        <div>
            <label for="occupation">OCCUPATIOM</label>
            <input type="text" name="occupation" id="occupation" placeholder="<?php echo $formUser->occupation ?>"
                   value="<?php echo $formUser->occupation ?>">
        </div>
        <div>
            <label for="email">EMAIL</label>
            <input type="text" name="email" id="email" placeholder="<?php echo $formUser->email ?>"
                   value="<?php echo $formUser->email ?>">
        </div>
        <div>
            <button type="submit">SUBMIT</button>
        </div>
        <div>
            <a href="user-list.php" class="backBtn">Cancel</a>
        </div>
    </form>
</div>
</body>

</html>