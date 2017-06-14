<?php




interface DatabaseObject{
    public function get();
    public function getList();
    public function create();
    public function save();
    public function delete();
}


class User implements DatabaseObject{
    private $id;
    private $username;
    private $firstname;
    private $lastname;
    private $email;
    private $points;

    /**
     * User constructor.
     * @param $username
     * @param $id
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $points
     */
    public function __construct($username, $id, $firstname, $lastname, $email, $points)
    {
        $this->username = $username;
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->points = $points;
    }


    public function get()
    {
        require "connect.php";
        if (!empty($_POST)) {
            // keep track validation errors

            // keep track post values
            $id = $_POST['id'];
            // validate input
            $valid = true;
            if (empty($id)) {
                $valid = false;
            }
            include 'connect.php';
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM Users where id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            Database::disconnect();
            return $data;
        }
    }

    public function getList()
    {

        require 'connect.php';
        $pdo = Database::connect();
        $sql = 'SELECT * FROM Users ORDER BY id';
        foreach ($pdo->query($sql) as $row) {
            echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['password'] . '</td>';
            echo '<td>' . $row['firstname'] . '</td>';
            echo '<td>' . $row['lastname'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['points'] . '</td>';
            echo '<td width=250>';;
            echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>';
            echo '&nbsp;';
            echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Delete</a>';
            echo '</tr>';
        }
        Database::disconnect();
    }


    public function create()
    {
        require "connect.php";
        if (!empty($_POST)) {
            // keep track validation errors

            // keep track post values
            $benutzer = $_POST['username'];
            $passwort = $_POST['password'];
            $vorname = $_POST['firstname'];
            $nachname = $_POST['lastname'];
            $email = $_POST['email'];


            // validate input
            $valid = true;
            if (empty($benutzer)) {
                $valid = false;
            }
            if (empty($passwort)) {
                $valid = false;
            }
            if (empty($vorname)) {
                $valid = false;
            }
            if (empty($nachname)) {
                $valid = false;
            }
            if (empty($email)) {
                $valid = false;
            }


            // insert data
            if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO Users (username, password, firstname, lastname, email) values(?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($benutzer, $passwort, $vorname, $nachname, $email));
                Database::disconnect();
                header("Location: index.php");
            }
        }
    }

    public function save()
    {
        require "connect.php";
        $id = null;
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }

        if (null == $id) {
            header("Location: index.php");
        }

        if (!empty($_POST)) {
            // keep track validation errors
            $nameError = null;
            $emailError = null;
            $mobileError = null;

            // keep track post values
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $points = $_POST['points'];

            // validate input
            $valid = true;
            if (empty($username)) {
                $nameError = 'Please enter Name';
                $valid = false;
            }

            if (empty($password)) {
                $emailError = 'Please enter Password';
                $valid = false;
            }

            if (empty($firstname)) {
                $mobileError = 'Please enter First Name';
                $valid = false;
            }
            if (empty($lastname)) {
                $mobileError = 'Please enter Last Name';
                $valid = false;
            }
            if (empty($email)) {
                $mobileError = 'Please enter Email';
                $valid = false;
            }
            if (empty($points)) {
                $mobileError = 'Please enter points';
                $valid = false;
            }


            // update data
            if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE Users  SET username = ?, password = ?, firstname = ?, lastname = ?, email = ?, points = ? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($username, $password, $firstname, $lastname, $email, $points, $id));
                Database::disconnect();
                header("Location: index.php");
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


        require "connect.php";
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
                $sql = "DELETE FROM Users WHERE " . $id;
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                Database::disconnect();
                header("Location: index.php");
            }
        }
    }


    /**
     * Getter for some private attributes
     * @return mixed $property
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    /**
     * Setter for some private attributes
     * @return mixed $name
     * @return mixed $value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}


if (isset($_POST["submit"])) {
    if (isset($_POST["price"])) {
        if (!is_numeric($_POST["price"]) || $_POST["price"] <= 1 || $_POST["price"] != round($_POST["price"])) {
            echo("Keine richtige Nummer eingegeben ");
            exit();
        } else {
            echo("price correct ");
        }
    } else {

    }
    if(isset($_POST["date"])){

        $d = DateTime::createFromFormat('Y-m-d', $_POST["date"]);
        if($d && $d->format('Y-m-d') === $_POST["date"]){
            echo ("datum correct ");
        } else {
            echo("Kein Datum ");
            exit();
        }
    }
}


?>