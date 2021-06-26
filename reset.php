<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Nova lozinka</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active">Nova lozinka</li>
                    </ul>
                </div>
            </div>
        </div>
		<?php if(isset($_GET['email'])) {
            $email = $_GET['email'];
        } ?>
        <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 container pt-3 pb-3">
                        <p>Molimo Vas da unesete lozinku koju ste primili u Vašem emailu.</p>
                        <hr>
                        <form action="update.php" method="post">
                            <label><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email;?>"><br>
                            <label><strong>Nova lozinka</strong></label>
                            <input type="password" name="password" class="form-control" required><br>
                            <input type="submit" class="vs-btn" name="resetPasswordBtn" value="RESETUJ LOZINKU">
                        </form>
                    </div>
                </div>
            </div>
        </section>

<?php require_once 'inc/bottom.php'; ?>