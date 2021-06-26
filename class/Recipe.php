<?php

class Recipe {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index() {
        $sql = "SELECT * FROM recipes ORDER BY r_id DESC";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }
	
	public function latest() {
		$sql = "SELECT * FROM recipes ORDER BY r_id DESC LIMIT 4";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
	}

    public function show($id) {
        $sql = "SELECT * FROM recipes WHERE r_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function create() {
        if($_FILES['image']['error']>0) {
            $msg[] = "Greska prilikom ucitavanja slike";
        }
        
        if(!(strtoupper(substr($_FILES['image']['name'],-4))==".JPG" || strtoupper(substr($_FILES['image']['name'],-5))==".JPEG" || strtoupper(substr($_FILES['image']['name'],-4))==".PNG" || strtoupper(substr($_FILES['image']['name'],-5))==".JFIF")) {
            $msg[] = "Pogresan tip fajla";
        }
        if(file_exists("../assets/uploads/" . $_FILES['image']['name'])) {
            $msg[] = "Slika već postoji. Molimo Vas da ne unosite slike sa istim imenom.";
        }
    
        if(!empty($msg)) {
            echo '<b>Greska:-</b><br>';
            foreach ($msg as $k) {
                echo '<li>' . $k;
            }
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'], "../assets/uploads/" . $_FILES['image']['name']);
            
            $name = $_POST['name'];
            $body = $_POST['body'];
            $image = "assets/uploads/" . $_FILES['image']['name'];
            $created = $_POST['created'];

            $sql = "INSERT INTO recipes VALUES (NULL, ?, ?, ?, ?)";
            $query = $this->conn->prepare($sql);
            $query->execute([$name, $body, $image, $created]);

            $row_count = $query->rowCount();

            if($row_count == 1) {
                header('Location: dash.php');
            } else {
                header('Location: dodaj-recept.php');
            }
        }
    }

    public function update() {
        $name = $_POST['name'];
        $body = $_POST['body'];
        $created_at = $_POST['created_at'];
        $id = $_POST['id'];

        $image = $_FILES['img']['name'];
        $p_img = $_POST['image'];

        if(empty($image)) {
            $image = $p_img;
        } else {
            $image = $_FILES['img']['name'];
            $temp_name = $_FILES['img']['tmp_name'];
            move_uploaded_file($temp_name, "../assets/uploads/$image");
        }

        if($image == '') {
            $img = NULL;
        } else {
            $img = "assets/uploads/".$image;
        }

        $sql = "UPDATE recipes SET r_name = '$name', r_body = '$body', r_image = '$img' WHERE r_id = $id";
        $query = $this->conn->query($sql);

        if($query) {
            header('Location: recepti.php');
        } else {
            header('Location: azuriraj-recept.php?r_id='.$id);
        }
    }
    public function delete($id) {
        $sql = "DELETE FROM recipes WHERE r_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: recepti.php');
        } else {
            header('Location: 404.php');
        }
    }
}