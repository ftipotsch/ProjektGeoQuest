<?php

require 'class.question.php';
User::save();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

<form class="form-horizontal" method="post" action="update.php?id=<?php echo $id?>



    <legend><h1> Update a User </h1> </legend>


    <div class="form-group">
<label class="col-md-4 control-label" for="username">Username</label>
<div class="col-md-4">
    <input type="text" id="username" name="username" placeholder="maxmusterman1" class="form-control input-md"  required="" maxlength="25" ?>
</div>
</div>
<br/>
<div class="form-group">
    <label class="col-md-4 control-label" for="password">Password</label>
    <div class="col-md-4">
        <input type="password" id="password" name="password" ?>
    </div>
</div>
<br/>
<div class="form-group">
    <label class="col-md-4 control-label" for="firstname">First Name</label>
    <div class="col-md-4">
        <input type="text" id="firstname" name="firstname" placeholder="Max" class="form-control input-md"  required="" maxlength="25" ?>
    </div>
</div>
<br/>
<div class="form-group">
    <label class="col-md-4 control-label" for="lastname">Last Name</label>
    <div class="col-md-4">
        <input type="text" id="lastname" name="lastname" placeholder="Musterman" class="form-control input-md"  required="" maxlength="25" ?>
    </div>
</div>
<br/>
<div class="form-group">
    <label class="col-md-4 control-label" for="email">E-Mail</label>
    <div class="col-md-4">
        <input type="email" id="email" name="email" placeholder="maxmusterman@gmail.com" class="form-control input-md"  ?>
    </div>
</div>
<br/>
<div class="form-group">
    <label class="col-md-4 control-label" for="points">Points</label>
    <div class="col-md-4">
        <input type="number" id="points" name="points" placeholder="" class="form-control input-md"  ?>
    </div>
</div>
<br/>
<div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-4">
        <input onclick="false" type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit"/>
    </div>
</div>


</form>

</body>
</html>