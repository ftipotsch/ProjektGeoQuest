<?php
require "CRUDUser/class.user.php";
user::login();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel ="" href="">
</head>
<body>
<form action="login.php" method="post">
    <h2 class="form-signin-heading">Login</h2>

    <?php
    if(isset($error_msg) && !empty($error_msg)) {
        echo $error_msg;
    }
    ?>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="username" required autofocus>
    <br />
    <label for="password">Passwort</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="" required>
    <br />
    <br />
    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>

</form>
</body>
</html>
