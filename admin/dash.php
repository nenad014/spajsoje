<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/session'));
session_start();
require_once 'inc/top.inc.php';
?>
<?php
    if(!isset($_SESSION['admin'])) {
        header('Location: index.php');
        exit;
    } else {
        $proizvodi = $product->index();
        $postovi = $blog->index();
        $recepti = $recipe->index();
        $porudzbine = $order->index();
        $korisnici = $user->index();
        $ordersLatest = $order->latest();
    }
?>
<?php require_once 'inc/sidebar.inc.php'; ?>

        <!-- Page Content  -->
        <div id="content">

<?php require_once 'inc/navbar.inc.php'; ?>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h2 class="card-title text-center"><i class="fa fa-users" aria-hidden="true"></i></h2>
                                        <p class="card-text text-center">Registrovanih korisnika: <?php echo count($korisnici); ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="users.php" class="btn btn-outline-light text-dark stretched-link">Vidi</a>
                                    </div>
                                </div><br>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h2 class="card-title text-center"><i class="fa fa-shopping-cart" aria-hidden="true"></i></h2>
                                        <p class="card-text text-center">Ukupno porudžbina: <?php echo count($porudzbine); ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="porudzbine.php" class="btn btn-outline-light text-dark stretched-link">Vidi</a>
                                    </div> 
                                </div><br>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h2 class="card-title text-center"><i class="fa fa-tasks" aria-hidden="true"></i></h2>
                                        <p class="card-text text-center">Ukupno proizvoda: <?php echo count($proizvodi); ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="proizvodi.php" class="btn btn-outline-light text-dark stretched-link">Vidi</a>
                                    </div>    
                                </div><br>   
                            </div>
                            <div class="col-lg-3 col-md-3">
                            <div class="card bg-yellow">
                                    <div class="card-body">
                                        <h2 class="card-title text-center"><i class="fa fa-tags" aria-hidden="true"></i></h2>
                                        <p class="card-text text-center">Ukupno recepata: <?php echo count($recepti); ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="recepti.php" class="btn btn-outline-light text-dark stretched-link">Vidi</a>
                                    </div>
                                </div><br>                               
                            </div>
                        </div>

            <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <i class="fa fa-money"></i> Najnovije porudžbine
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Datum</th>
                                                    <th>Broj porudžbine</th>
                                                    <th>Poručilac</th>
                                                    <th>Adresa isporuke</th>
                                                    <th>Iznos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($ordersLatest as $latest) : ?>
                                                <tr>
                                                    <td><?php echo $latest->created; ?></td>
                                                    <td><?php echo $latest->order_id; ?></td>
                                                    <td><?php echo $latest->fname; ?> <?php echo $latest->lname; ?></td>
                                                    <td><?php echo $latest->delivery_adress; ?></td>
                                                    <td class="text-right"><?php echo $latest->grand_total; ?> RSD</td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="orders.php">Vidi sve <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>
        </div>
    </div>

<?php require_once 'inc/bottom.inc.php'; ?>