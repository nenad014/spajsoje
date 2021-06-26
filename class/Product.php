<?php

class Product {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index() {
        $sql = "SELECT * FROM product";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }
    public function show($id) {
        $sql = "SELECT * FROM product WHERE id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function create() {
        $targetDir = '../assets/uploads/';
        $fileName = basename($_FILES['img']['name'][0]);
        $fileName2 = basename($_FILES['img']['name'][1]);
        $fileName3 = basename($_FILES['img']['name'][2]);
        $targetFilePath = $targetDir . $fileName;
        $targetFilePath2 = $targetDir . $fileName2;
        $targetFilePath3 = $targetDir . $fileName3;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'jpeg', 'png', 'jfif');
        if(in_array($fileType, $allowTypes)) {
            move_uploaded_file($_FILES['img']['tmp_name'][0], $targetFilePath) && move_uploaded_file($_FILES['img']['tmp_name'][1], $targetFilePath2) && move_uploaded_file($_FILES['img']['tmp_name'][2], $targetFilePath3);
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $product_no = htmlspecialchars(strip_tags($_POST['product_no']));
            $details = htmlspecialchars(strip_tags($_POST['details']));
            $price = htmlspecialchars(strip_tags($_POST['price']));
            if(!empty($fileName)) {
                $img1 = "assets/uploads/" . $_FILES['img']['name'][0];
            } else {
                $img1 = NULL;
            }
            if(!empty($fileName2)) {
                $img2 = "assets/uploads/" . $_FILES['img']['name'][1];
            } else {
                $img2 = NULL;
            }
            if(!empty($fileName3)) {
                $img3 = "assets/uploads/" . $_FILES['img']['name'][2];
            } else {
                $img3 = NULL;
            }
            $status = htmlspecialchars(strip_tags($_POST['status']));

            $sql = "INSERT INTO product VALUES(NULL, :product_no, :name, :details, :price, :image1, :image2, :image3, :status)";
            $query = $this->conn->prepare($sql);
            $query->execute(["product_no"=>$product_no, "name"=>$name, "details"=>$details, "price"=>$price, "image1"=>$img1, "image2"=>$img2, "image3"=>$img3, "status"=>$status]);

            $row_count = $query->rowCount();

            if($row_count == 1) {
                header('Location: dash.php');
            } else {
                header('Location: dodaj-proizvod.php');
            }
        }
    }
    
    public function update() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sku = $_POST['sku'];
        $details = $_POST['details'];
        $price = $_POST['price'];
        $status = $_POST['status'];

        $img_1 = $_FILES['img']['name'][0];
        $img_2 = $_FILES['img']['name'][1];
        $img_3 = $_FILES['img']['name'][2];
        $p_img1 = $_POST['image1'];
        $p_img2 = $_POST['image2'];
        $p_img3 = $_POST['image3'];

        if(empty($img_1)) {
            $img_1 = $p_img1;
        } else {
            $img_1 = $_FILES['img']['name'][0];
            $temp_name = $_FILES['img']['tmp_name'][0];
            move_uploaded_file($temp_name, "../assets/uploads/$img_1");
        }
        if(empty($img_2)) {
            $img_2 = $p_img2;
        } else {
            $img_2 = $_FILES['img']['name'][1];
            $temp_name = $_FILES['img']['tmp_name'][1];
            move_uploaded_file($temp_name, "../assets/uploads/$img_2");
        }
        if(empty($img_3) || $img_3 == '') {
            $img_3 = $p_img3;
        } else {
            $img_3 = $_FILES['img']['name'][2];
            $temp_name = $_FILES['img']['tmp_name'][2];
            move_uploaded_file($temp_name, "../assets/uploads/$img_3");
        }

        if($img_1 == '') {
            $img1 = NULL;
        } else {
            $img1 = "assets/uploads/".$img_1;
        }
        if($img_2 == '') {
            $img2 = NULL;
        } else {
            $img2 = "assets/uploads/".$img_2;
        }
        if($img_3 == '') {
            $img3 = NULL;
        } else {
            $img3 = "assets/uploads/".$img_3;
        }
        
        $sql = "UPDATE product SET sku = '$sku', name = '$name', details = '$details', price = '$price', image1 = '$img1', image2 = '$img2', image3 = '$img3', status='$status' WHERE id=$id";
        $query = $this->conn->query($sql);

        if($query) {
            header('Location: proizvodi.php');
        } else {
            header('Location: azuriraj-proizvod.php?id='.$id);
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM product WHERE id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: proizvodi.php');
        } else {
            header('Location: 404.php');
        }
    }

    public function related($id) {
        $sql = "SELECT * FROM product WHERE NOT id = ? LIMIT 3";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }
}