<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Prijava</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active">Prijava</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 container pt-3 pb-3">
                        <p>Molimo Vas da popunite obrazac kako biste se prijavili.</p>
                        <hr>
                        <form action="login.register.php" method="POST">
                            <label><strong>Email</strong></label>
                            <input type="email" name="login_email" class="form-control" required><br>
                            <label><strong>Lozinka</strong></label>
                            <input type="password" name="login_password" class="form-control" required><br>
                            <input type="submit" class="vs-btn" name="logBtn" value="PRIJAVA"><br><br><hr>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p>Nemate nalog? Molimo vas da se <a href="registracija.php"><strong>registrujete</strong></a>.</p>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <p class="text-right">Zaboravili ste <a href="reset_pass.php">lozinku</a>?</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

<?php require_once 'inc/bottom.php'; ?>