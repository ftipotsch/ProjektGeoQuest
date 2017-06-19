<?php




interface DatabaseObject{
    public function get();
    public function getList();
    public function create();
    public function save();
    public function delete();
}


class Question implements DatabaseObject
{
    private $question;
    private $answer1;
    private $answer2;
    private $answer3;
    private $answer4;
    private $creator;
    private $x_coordinates;
    private $y_coordinates;
    private $rating;

    /**
     * User constructor.
     * @param $question
     * @param $answer1
     * @param $answer2
     * @param $answer3
     * @param $answer4
     * @param $creator
     * @param $x_coordinates
     * @param $y_coordinates
     * @param $rating
     */
    public function __construct($question, $answer1, $answer2, $answer3, $answer4, $creator, $x_coordinates, $y_coordinates, $rating)
    {
        $this->question = $question;
        $this->answer1 = $answer1;
        $this->answer2 = $answer2;
        $this->answer3 = $answer3;
        $this->answer4 = $answer4;
        $this->creator = $creator;
        $this->x_coordinates = $x_coordinates;
        $this->y_coordinates = $y_coordinates;
        $this->rating = $rating;
    }


    public function get()
    {
        require "../connect.php";
        if (!empty($_POST)) {
            // keep track validation errors

            // keep track post values
            $id = $_POST['id'];
            // validate input
            $valid = true;
            if (empty($id)) {
                $valid = false;
            }
            include '../connect.php';
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM Questions where id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            Database::disconnect();
            return $data;
        }
    }

    public function getList()
    {

        require '../connect.php';
        $pdo = Database::connect();
        $sql = 'SELECT * FROM Questions ORDER BY id';
        foreach ($pdo->query($sql) as $row) {
            echo '<tr>';
            echo '<td>' . $row['question'] . '</td>';
            echo '<td>' . $row['answer1'] . '</td>';
            echo '<td>' . $row['answer2'] . '</td>';
            echo '<td>' . $row['answer3'] . '</td>';
            echo '<td>' . $row['answer4'] . '</td>';
            echo '<td>' . $row['richtig'] . '</td>';
            echo '<td>' . $row['x_coordinates'] . '</td>';
            echo '<td>' . $row['y_coordinates'] . '</td>';
            echo '<td>' . $row['rating'] . '</td>';
            echo '<td width=250>';;
            echo '<a class="btn btn-success" href="qupdate.php?id=' . $row['id'] . '">Update</a>';
            echo '&nbsp;';
            echo '<a class="btn btn-danger" href="qdelete.php?id=' . $row['id'] . '">Delete</a>';
            echo '</tr>';
        }
        Database::disconnect();
    }
    public function getQuestion()
    {
        $i =0;
        require 'connect.php';
        $pdo = Database::connect();
        $sql = 'SELECT * FROM Questions ORDER BY id';
    $output = null;
    foreach ($pdo->query($sql) as $row)

    $output = $output . "['".$row['id']."',"."'".$row['question']."',"."'".$row['answer1']."',"."'".$row['answer2']."',"."'".$row['answer3']."',"."'".$row['answer4']."',"."'".$row['richtig']."',"."'".$row['x_coordinates']."',"."'".$row['y_coordinates']."',"."'".$row['rating']."'],";
    $i = $i+1;

 $finaloutput = substr($output, 0, -1);
        return $finaloutput . "];";
        Database::disconnect();
}

    public function create()
    {
        require "../connect.php";
        if (!empty($_POST)) {
            // keep track validation errors

            // keep track post values
            $question = $_POST['question'];
            $answer1 = $_POST['answer1'];
            $answer2 = $_POST['answer2'];
            $answer3 = $_POST['answer3'];
            $answer4 = $_POST['answer4'];
            $creator = $_POST['richtig'];
            $x_coordinates = $_POST['x_coordinates'];
            $y_coordinates = $_POST['y_coordinates'];
            $rating = $_POST['rating'];


            // validate input
            $valid = true;
            if (empty($question)) {
                $valid = false;
            }
            if (empty($answer1)) {
                $valid = false;
            }
            if (empty($answer2)) {
                $valid = false;
            }
            if (empty($answer3)) {
                $valid = false;
            }
            if (empty($answer4)) {
                $valid = false;
            }
            if (empty($creator)) {
                $valid = false;
            }
            if (empty($x_coordinates)) {
                $valid = false;
            }
            if (empty($y_coordinates)) {
                $valid = false;
            }
            if (empty($rating)) {
                $valid = false;
            }


            // insert data
            if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO Questions (question, answer1, answer2, answer3, answer4, richtig, x_coordinates, y_coordinates, rating ) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($question, $answer1, $answer2, $answer3, $answer4, $creator, $x_coordinates, $x_coordinates, $rating));
                Database::disconnect();
                header("Location: qcreate.php");
            }
        }
    }

    public function save()
    {
        require "../connect.php";

            $id = $_GET['id'];


        if (null == $id) {
            header("Location: ../index.php");
        }

        if (!empty($_POST)) {

            // keep track post values
            $question = $_POST['question'];
            $answer1 = $_POST['answer1'];
            $answer2 = $_POST['answer2'];
            $answer3 = $_POST['answer3'];
            $answer4 = $_POST['answer4'];
            $creator = $_POST['creator'];
            $x_coordinates = $_POST['x_coordinates'];
            $y_coordinates = $_POST['y_coordinates'];
            $rating = $_POST['rating'];

            // validate input
            $valid = true;
            if (empty($question)) {
               $valid = false;
            }

            if (empty($answer1)) {
                $valid = false;
            }

            if (empty($answer2)) {
                $valid = false;
            }
            if (empty($answer3)) {
                $valid = false;
            }
            if (empty($answer4)) {
                $valid = false;
            }
            if (empty($x_coordinates)) {
                $valid = false;
            }
            if (empty($y_coordinates)) {
                $valid = false;
            }
            if (empty($rating)) {
                $valid = false;
            }


            // update data
            if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE Questions  SET question = ?, answer1 = ?, answer2 = ?, answer3 = ?, answer4 = ?, richtig = ?, x_coordinates = ?, y_coordinates = ?, rating = ?  WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($question, $answer1, $answer2, $answer3, $answer4, $creator, $x_coordinates, $y_coordinates, $rating, $id));
                Database::disconnect();
                header("Location: ../index.php");
            }
        } else {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM Users where id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $username = $data['username'];
            $password = $data['password'];
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $points = $data['points'];
            Database::disconnect();
        }
    }


    public function delete()
    {


        require_once "../connect.php";
        if (!empty($_POST)) {
            // keep track validation errors

            // keep track post values
            $id = $_POST['id'];


            // validate input
            $valid = true;
            if (empty($id)) {
                $valid = false;
            }

            if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM Questions WHERE " . $id;
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                Database::disconnect();
                header("Location: qread.php");
            }
        }
    }
    function zeigeFrage($id){

        require "connect.php";
        if (!empty($_GET['id'])){
            $id = $_GET['id'];
            $valid = true;
            if (empty($id)){
                $valid = flase;
            }
        }
        if ($valid){
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT question, answer1, answer2 , answer3, answer4 FROM questions WHERE id =". $id;
            foreach ($pdo->query($sql) as $row) {
                $rand = rand(1,4);
                $question = $row["question"];
                if ($rand == 1) {
                    $antwort1 = $row["answer1"];
                    $antwort2 = $row["answer2"];
                    $antwort3 = $row["answer3"];
                    $antwort4 = $row["answer4"];
                }
                if ($rand == 2) {
                    $antwort2 = $row["answer1"];
                    $antwort3 = $row["answer2"];
                    $antwort4 = $row["answer3"];
                    $antwort1 = $row["answer4"];
                }
                if ($rand == 3) {
                    $antwort3 = $row["answer1"];
                    $antwort4 = $row["answer2"];
                    $antwort1 = $row["answer3"];
                    $antwort2 = $row["answer4"];
                }
                if ($rand == 4) {
                    $antwort4 = $row["answer1"];
                    $antwort1 = $row["answer2"];
                    $antwort2 = $row["answer3"];
                    $antwort3 = $row["answer4"];
                }




            echo "<div id='wrapper'>";
                echo "<label><h1>$question</h1></label>";



            echo "<form action=\"Fragen.php?id=$id\" method=\"post\">";

            echo "<input type='radio' id='01' name='Button' value = $antwort1>";
            echo "<label for='01'>$antwort1</label><br>";
            echo "<input type='radio' id='02' name='Button' value = $antwort2>";
            echo "<label for='02'>$antwort2</label><br>";
            echo "<input type='radio' id='03' name='Button' value = $antwort3>";
            echo "<label for='03'>$antwort3</label><br>";
            echo "<input type='radio' id='04' name='Button' value = $antwort4>";
            echo "<label for='04'>$antwort4</label><br>";
            echo "<input type='submit' value ='Antworten' >";
            echo "<input type='hidden' name = 'id' value = $id >";
            echo "</form>";

        }
            Database::disconnect();

   }
}
    function pruefeAntwort(){

        require_once "connect.php";
        if (!empty($_GET['id'])){
            $id = $_GET['id'];
            $valid = true;
            if (empty($id)){
                $valid = flase;
            }
            if(isset($_POST['Button'])) {
                $gewaehlteAntwort = $_POST['Button'];
            } else {
                $valid = false;
            }
        }
        if ($valid) {
            global $richtig;
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT richtig FROM questions WHERE richtig = '$gewaehlteAntwort' and id = '$id'";
            foreach ($pdo->query($sql) as $row) {
                 $richtig = $row['richtig'];
            }
            if($richtig != null) {
                echo "Richtige Antwort";
                $id = $_SESSION['id'];
                $sql = "UPDATE Users  SET points = points + 1 WHERE id = '$id' ";
                $q = $pdo->prepare($sql);
                $q->execute(array());
                $sql = "SELECT points FROM Users WHERE id = '$id'";
                foreach ($pdo->query($sql) as $row) {
                    $_SESSION['points'] = $row['points'];
                }
                header("Location: index.php");
            } else {
                echo "Falsche Antwort";
            }



        }
        Database::disconnect();
}

}

