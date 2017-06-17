<?php

require 'class.question.php';
Question::create();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

<form class="form-horizontal" method="post" action="qcreate.php">



    <legend><h1> Create New Question </h1> </legend>



    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="question">question</label>
        <div class="col-md-4">
            <input type="text" id="question" name="question" ?>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="answer1">First Answer</label>
        <div class="col-md-4">
            <input type="text" id="answer1" name="answer1" placeholder="" class="form-control input-md"  ?>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="answer2">Second Answer</label>
        <div class="col-md-4">
            <input type="text" id="answer2" name="answer2" placeholder="" class="form-control input-md"  ?>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="answer3">Third Answer</label>
        <div class="col-md-4">
            <input type="text" id="answer3" name="answer3" placeholder="" class="form-control input-md"   ?>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="answer4">fourth Answer</label>
        <div class="col-md-4">
            <input type="text" id="answer4" name="answer4" placeholder="" class="form-control input-md"  ?>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="creator">Creator</label>
        <div class="col-md-4">
            <input type="text" id="creator" name="creator" placeholder="" class="form-control input-md"  ?>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="x_coordinates">X coordinater</label>
        <div class="col-md-4">
            <input type=number id="x_coordinates" name="x_coordinates" placeholder="" class="form-control input-md"  ?>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="y_coordinates">Y Coordinate Answer</label>
        <div class="col-md-4">
            <input type="number" id="y_coordinates" name="y_coordinates" placeholder="" class="form-control input-md"  ?>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label class="col-md-4 control-label" for="rating">Rating</label>
        <div class="col-md-4">
            <input type="number" id="rating" name="rating" placeholder="" class="form-control input-md"  ?>
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