<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel ="" href="">
</head>
<body>
<?php
    $id = $_GET['id'];
require "CRUDQuestion/class.question.php";
Question::zeigeFrage($id);
Question::pruefeAntwort();
?>
</body>
</html>