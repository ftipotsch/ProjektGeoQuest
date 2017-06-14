<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel ="" href="">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <h1>READ</h1>
    </div>
    <div class="row">

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-Mail</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require "class.question.php";
            User::getList();
            ?>
            <table id="txtHint"class="table table-striped table-bordered"></table>
            </tbody>
        </table>

</body>
</html>
