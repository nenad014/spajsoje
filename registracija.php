<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Registracija</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active">Registracija</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 container pt-3 pb-3">
                        <p>Molimo Vas da popunite obrazac kako biste napravili novi nalog.</p>
                        <hr>
                        <form action="login.register.php" method="POST">
                            <label><strong>Korisničko ime</strong></label>
                            <input type="text" name="name" class="form-control" required><br>
                            <label><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" required><br>
                            <label><strong>Lozinka</strong></label>
                            <input type="password" name="password" class="form-control" required><br>
                            <p>Kreiranjem naloga prihvatate naše <a href="terms-conditions.php">uslove i pojmove prodaje</a></p>
                            <br>
                            <input type="submit" class="vs-btn" name="regBtn" value="REGISTRACIJA">
                            <hr>
                            <p class="text-center">Već imate otvoren nalog? Molimo Vas da se <a href="prijava.php"><strong>prijavite</strong></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

<?php require_once 'inc/bottom.php'; ?>