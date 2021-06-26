<?php

class Admin {

    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function logAdmin() {
        $name = $_POST['name'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM admin WHERE admin_name = ? AND admin_password = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$name, $password]);

        $admin = $query->fetch(PDO::FETCH_OBJ);

        if($admin != NULL) {
            session_start();
            $_SESSION['admin'] = $admin;
            header('Location: dash.php');
			die();
        } else {
            header('Location: index.php');
        }
    }
}