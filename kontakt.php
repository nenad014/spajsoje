<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Kontakt</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active">Kontakt</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
            <div class="container">
                <div class="row text-center text-lg-start">
                    <div class="col-lg-6">
                        <div class="section-title mb-25">
                            <h2 class="sec-title1">Informacije</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-20">
                                <p class="mb-2 fw-semibold">Gandijeva 130b, 11070 Novi Beograd</p>
                                <p class="mb-2 fw-semibold">Radno vreme 8:30PM</p>
                                <p class="mb-2 fw-semibold">info@spajsoje.com</p>
                                <p class="mb-2 fw-semibold">+381 64 198 44 47</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-30 mt-lg-0">
                        <div class="section-title mb-25">
                            <h2 class="sec-title1">Pošaljite poruku</h2>
                        </div>
                        <form action="contact.php" method="post">
                            <input type="text" name="name" class="form-control" placeholder="Ime i prezime" /><br>
                            <input type="text" name="email" class="form-control" placeholder="Email" /><br>
                            <input type="text" name="subject" class="form-control" placeholder="Naslov poruke" /><br>
                            <textarea class="form-control" name="message" placeholder="Vaša poruka"></textarea><br>
							<div class="d-grid gap-2 col-6 mx-auto">
								<input type="submit" class="vs-btn" value="Pošalji" name="sendMsgBtn">
							</div>
                        </form>
                    </div>
                    <div class="col-12 my-30">
                        <div class="ratio ratio-21x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.8607036672897!2d20.38278801540672!3d44.80402737909875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6f7426d2b953%3A0x6ba2c683ee697edd!2sGandijeva%20130b%2C%20Beograd%20192683!5e0!3m2!1sen!2srs!4v1620929198503!5m2!1sen!2srs"
                                height="500"
                                style="border: 0; margin: 0;"
                                allowfullscreen=""
                                aria-hidden="false"
                                tabindex="0"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php require_once 'inc/bottom.php'; ?>