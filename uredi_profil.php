<?php require_once 'inc/header.php'; ?>
<?php
    if(isset($_SESSION['loggedUser'])) {
        $single = $user->show($_SESSION['loggedUser']->u_id);
        $porudzbine = $order->getByUser($_SESSION['loggedUser']->u_id);
    } else {
        header('Location: index.php');
    }
?>
<?php require_once 'inc/nav.inc.php'; ?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Uredi profil</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">početna</a></li>
                        <li class="active"><?php echo $single->username; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="best-seller-wrapper bg-light space">
            <div class="container">
               <div class="row">
                    <div class="col-md-6 offset-md-3">
                            <form action="update.php" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Korisničko ime</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $single->username; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $single->email; ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Lozinka</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $single->password; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="fname" class="form-label">Ime</label>
                                    <input type="text" name="fname" class="form-control" value="<?php echo $single->fname; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="lname" class="form-label">Prezime</label>
                                    <input type="text" name="lname" class="form-control" value="<?php echo $single->lname; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Adresa</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $single->address; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="delivery_address" class="form-label">Adresa isporuke</label>
                                    <input type="text" name="delivery_address" class="form-control" value="<?php echo $single->delivery_address; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="tel" name="phone" class="form-control" value="<?php echo $single->phone; ?>">
                                </div>
                                <input type="text" name="u_id" value="<?php echo $single->u_id; ?>">
                                <input type="submit" class="btn btn-success" value="Ažuriraj" name="updateUserBtn">
                            </form>
                    </div>
               </div>
            </div>    
        </section>

<?php require_once 'inc/bottom.php'; ?>