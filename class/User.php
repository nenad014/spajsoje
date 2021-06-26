<?php

class User {

    private $conn;
	// public $register_user = NULL;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index() {
        $sql = "SELECT * FROM users";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function show($id) {
        $sql = "SELECT * FROM users WHERE u_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);
        
        return $result;
    }

    public function register() {
        if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = md5($_POST['password']);
            

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Pogrešan format email adrese. Pokušajte ponovo.";
            }else {
                echo 'Vaš nalog je kreiran, <br /> molimo Vas da ga verifikujete klikom na aktivacioni link koji smo Vam poslali na Vaš email';
                $hash = md5(rand(0, 1000));
            }
        }
        

        $sql = "INSERT INTO users (username, email, password, hash) VALUES (:name, :email, :password, :hash)";
        $query = $this->conn->prepare($sql);
        $query->execute(['name'=>$name, 'email'=>$email, 'password'=>$password, 'hash'=>$hash]);

        if($query) {
			// $this->register_user = true;
			// header('Location: registracija.php');
            // header('Location: prijava.php');
            $to      = $email; // Send email to our user
            $subject = 'Verifikacija registracije'; // Give the email a subject 
            $message = '
            
            Hvala Vam na registraciji!
            Vaš nalog je kreiran, možete se prijaviti sa Vašim podacima nakon što aktivirate Vaš nalog klikom na sledeći url link ispod.
            
            ------------------------
            Korisničko ime: '.$name.'
            ------------------------
            
            Molimo Vas da kliknete na ovaj link da bi aktivirali Vaš nalog:
            https://newage.rs/spajsoje-new/verify.php?email='.$email.'&hash='.$hash.'
            
            '; // Our message above including the link
                                
            $headers = 'Od:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            mail($to, $subject, $message, $headers); // Send our email
        } else {
            header('Location: registracija.php');
        }
    }
	
	public function verify() {
        $email = htmlspecialchars($_GET['email']);
        $hash = htmlspecialchars($_GET['hash']);

        $sql = "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
        $query = $this->conn->query($sql);
        $match = $query->rowCount();

        if($match > 0) {
            $update = "UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
            $qUpdate = $this->conn->query($update);
            if($qUpdate) {
                header('Location: prijava.php');
            } else {
                echo "The url is either invalid or you already have activated your account.";
            }
        }
    }

    public function login() {
        $email = $_POST['login_email'];
        $password = md5($_POST['login_password']);

        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$email, $password]);

        $loggedUser = $query->fetch(PDO::FETCH_OBJ);

        if($loggedUser != NULL) {
            $_SESSION['loggedUser'] = $loggedUser;
            header('Location: korisnik.php');
        } else {
            header('Location: prijava.php');
        }
    }

    public function loginToProceed() {
        $email = $_POST['login_email'];
        $password = md5($_POST['login_password']);

        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$email, $password]);

        $loggedUser = $query->fetch(PDO::FETCH_OBJ);

        if($loggedUser != NULL) {
            $_SESSION['loggedUser'] = $loggedUser;
            header('Location: porudzbina.php');
        } else {
            header('Location: login.view.php');
        }
    }

    public function update() {
        $username = htmlspecialchars($_POST['username']);
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $address = htmlspecialchars($_POST['address']);
        $delivery_address = htmlspecialchars($_POST['delivery_address']);
        $phone = htmlspecialchars($_POST['phone']);
        $u_id = htmlspecialchars($_POST['u_id']);

        $sql = "UPDATE users SET username = '$username', fname = '$fname', lname = '$lname', address = '$address', delivery_address = '$delivery_address', phone = '$phone' WHERE u_id = $u_id";
        $query = $this->conn->query($sql);

        if($query) {
            header('Location: korisnik.php');
        } else {
            header('Location: uredi_profil.php');
        }
    }

    public function resetPwd() {
        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Pogrešan format email adrese. Pokušajte ponovo.";
            }else {
                echo 'Vaš zahtev je poslat na vašu email adresu.';
                $new_pass = rand(1000, 5000);
                $hash = md5(rand(0, 1000));
            }
        }

        $sql = "SELECT * FROM users WHERE email = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$email]);

        if($query) {
            $to      = $email; // Send email to our user
            $subject = 'Resetovanje lozinke'; // Give the email a subject 
            $message = '
            
            Hvala Vam na zahtevu!
            Vaša lozinka će biti resetovana. Možete se prijaviti sa Vašim novim podacima nakon što resetujete lozinku klikom na sledeći url link ispod.
            
            ------------------------
            Vaš email: '.$email.'
            Nova lozinka: '.$new_pass.'
            ------------------------
            
            Molimo Vas da kliknete na ovaj link da bi resetovali Vašu lozinku:
            https://newage.rs/spajsoje-new/reset.php?email='.$email.'&hash='.$hash.'
            
            '; // Our message above including the link
                                
            $headers = 'Od:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            mail($to, $subject, $message, $headers); // Send our email
        } else {
            header('Location: reset_pass.php');
        }
    }

    public function resetPassword() {
        $email = htmlspecialchars($_POST['email']);
        $password = md5($_POST['password']);

        $sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
        $query = $this->conn->query($sql);
        if($query) {
            header('Location: prijava.php');
        } else {
            header('Location: reset.php');
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE u_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: korisnici.php');
        } else {
            header('Location: 404.php');
        }
    }
}