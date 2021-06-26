<?php

class Blog {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index() {
        $sql = "SELECT * FROM blog ORDER BY blog_id DESC";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    // Poslednje 4 objave
    public function latestIndex() {
        $sql = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 4";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    // Sidebar objave
    public function latest() {
        $sql = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 3";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function show($id) {
        $sql = "SELECT * FROM blog WHERE blog_id = ?";
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
            
            $title = $_POST['title'];
            $body = $_POST['body'];
            $image = "assets/uploads/" . $_FILES['image']['name'];
            $created = $_POST['created'];

            $sql = "INSERT INTO blog VALUES (NULL, ?, ?, ?, ?)";
            $query = $this->conn->prepare($sql);
            $query->execute([$title, $body, $image, $created]);

            $row_count = $query->rowCount();

            if($row_count == 1) {
                header('Location: dash.php');
            } else {
                header('Location: dodaj-blog.php');
            }
        }
    }

    public function update() {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $created_at = $_POST['created_at'];
        $blog_id = $_POST['blog_id'];

        $image = $_FILES['img']['name'];
        $p_img = $_POST['cover_img'];

        if(empty($image)) {
            $image = $p_img;
        } else {
            $image = $_FILES['img']['name'];
            $temp_name = $_FILES['img']['tmp_name'];
            move_uploaded_file($temp_name, "../assets/uploads/$image");
        }

        if($image == '') {
            $cover_img = NULL;
        } else {
            $cover_img = "assets/uploads/".$image;
        }

        $sql = "UPDATE blog SET title='$title', body='$body', cover_img='$cover_img' WHERE blog_id = $blog_id";
        $query = $this->conn->query($sql);

        if($query) {
            header('Location: blog.php');
        } else {
            header('Location: azuriraj-blog-post.php?blog_id='.$blog_id);
        }
    }
    public function delete($id) {
        $sql = "DELETE FROM blog WHERE blog_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: blog.php');
        } else {
            header('Location: 404.php');
        }
    }
}