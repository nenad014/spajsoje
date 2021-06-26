<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Zaboravljena lozinka</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active">Zaboravljena lozinka</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 container pt-3 pb-3">
                        <p>Molimo Vas da unesete Vaš Email kako bismo Vam poslali link sa lozinkom.</p>
                        <hr>
                        <form action="send_link.php" method="POST">
                            <label><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" required><br>
                            <input type="submit" class="vs-btn" name="submit_email" value="POŠALJI"><br>
                        </form>
                    </div>
                </div>
            </div>
        </section>

<?php require_once 'inc/bottom.php'; ?>