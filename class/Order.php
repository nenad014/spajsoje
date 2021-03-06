<?php

class Order {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index() {
        $sql = "SELECT * FROM orders ORDER BY created DESC";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function latest() {
        $sql = "SELECT * FROM orders ORDER BY created DESC LIMIT 5";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function show($id) {
        $sql = "SELECT * FROM orders WHERE order_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function getByUser($id) {
        $sql = "SELECT * FROM orders WHERE user_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function create() {
        $user_id = $_POST['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $delivery_address = $_POST['delivery_address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $products_sku = $_POST['products_sku'];
        $products = $_POST['products'];
        $quantity = $_POST['quantity'];
        $grand_total = $_POST['grand_total'];
        $created = date('Y-m-d');
        $status = "Pending";

        $sql = "INSERT INTO orders VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->conn->prepare($sql);
        $query->execute([$user_id, $fname, $lname, $email, $phone, $address, $delivery_address, $products_sku, $products, $quantity, $grand_total, $created, $status]);
        $row_count = $query->rowCount();

        if($row_count == 1) {
            header("Location: korisnik.php?uspesna-porudzbina");

            /* $to = "$email, nenad@newage.rs, vlada@newage.rs";
            $subject = "Porud??bina $invoince_no";
            $message = "Hvala Vam na izvr??enoj kupovini preko na??eg sajta.\n
            Ukoliko ste se odlu??ili da porud??binu izvr??ite pouze??em, bi??ete obave??teni od strane kurirske slu??be o trenutku preuzimanja porud??bine.\n
            Ako ste se ipak odlu??ili da porud??binu izvr??ite uplatnicom, molimo Vas da na njoj unesete slede??e:\n
            Uplatilac: $fname $lname i $address,\n
            Svha uplate: EQUI porud??bina,\n
            Primalac: Equi studio Paunova 18, Beograd 11000,\n
            Iznos: $grand_total,\n
            Ra??un primaoca: 250-1530000155030-41.\n
            Porud??bina ??e biti poslata onog trenutka kada se uplata proknji??i.";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: equi.studio@gmail.com';

            mail($to, $subject, $message, $headers); */

        } else {
            header('Location: porudzbina.php');
        }
    }

    public function update() {
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];

        $sql = "UPDATE orders SET status = '$status' WHERE order_id = $order_id";
        $query = $this->conn->query($sql);

        if($query) {
            header('Location: porudzbine.php');
        }
    }
}