<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel ="" href="">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
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
                <th>Question</th>
                <th>Answer 1</th>
                <th>Answer 2</th>
                <th>Answer 3</th>
                <th>Answer 4</th>
                <th>Correct answer</th>
                <th>X-Coordinates</th>
                <th>Y-Coordinates</th>
                <th>Rating</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            <?php
            require "class.question.php";
            Question::getList();
            ?>
            <table id="txtHint"class="table table-striped table-bordered"></table>
            </tbody>
        </table>

</body>
</html>
