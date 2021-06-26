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
                    <h1 class="breadcumb-title">Korisnik</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">početna</a></li>
                        <li class="active"><?php echo $single->username; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="best-seller-wrapper bg-light space">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">MOJE PORUDŽBINE</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active pt-3 pb-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3>INFORMACIJE: </h3>
					<hr>
					<table>
						<tr>
							<td><strong>Korisničko ime: </strong></td>
							<td><?php echo $single->username; ?></td>
						</tr>
						<tr>
							<td><strong>email: </strong></td>
							<td><?php echo $single->email; ?></td>
						</tr>
                        <tr>
                            <td><strong>Ime i prezime: </strong></td>
                            <td><?php echo $single->fname; ?> <?php echo $single->lname; ?></td>
                        </tr>
                        <tr>
							<td><strong>Broj: </strong></td>
							<td><?php echo $single->phone; ?></td>
						</tr>
                        <tr>
							<td><strong>Adresa korisnika: </strong></td>
							<td><?php echo $single->address; ?></td>
						</tr>
                        <tr>
							<td><strong>Adresa isporuke: </strong></td>
							<td><?php echo $single->delivery_address; ?></td>
						</tr>
					</table>
					<a href="uredi_profil.php" class="btn btn-warning">Uredi profil</a>
                    <a href="promeni_lozinku.php" class="btn btn-danger">Promeni lozinku</a>
                </div>
                <div class="tab-pane fade pt-3 pb-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3>MOJE PORUDŽBINE</h3>
                    <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Broj porudžbine</th>
                                    <th>Artikli</th>
                                    <th>Iznos</th>
                                    <th>Datum</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($porudzbine as $each) : ?>
                                    <tr>
                                        <td><?php echo $each->order_id; ?></td>
                                        <td>
                                            <?php
                                            $porudzbina = $each->product_name;
                                            $values = explode(",", $porudzbina, -1);
                                            foreach($values as $item) {
                                                echo $item . "<br>";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $each->grand_total; ?> RSD</td>
                                        <td><?php echo $each->created; ?></td>
                                        <td><button class="btn btn-outline-info"><?php echo $each->status; ?></button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>
                <div class="tab-pane fade pt-3 pb-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>


            
        </section>

<?php require_once 'inc/bottom.php'; ?>