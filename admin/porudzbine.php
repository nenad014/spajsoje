<?php require_once 'inc/top.inc.php'; ?>
<?php
    if(isset($_SESSION['admin'])) {
        $porudzbine = $order->index();
    } else {
        header('Location: index.php');
    }
?>
<?php require_once 'inc/sidebar.inc.php'; ?>

<!-- Page Content  -->
<div id="content">

<?php require_once 'inc/navbar.inc.php'; ?>
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 py-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Porudžbine</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-top px-3">
                                    <h3>
                                        <i class="fa fa-users"></i> Porudžbine
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Broj</th>
                                                    <th>Datum</th>
                                                    <th>Poručilac</th>
                                                    <th>email</th>
                                                    <th>Telefon</th>
                                                    <th>Adresa</th>
                                                    <th>Adresa isporuke</th>
                                                    <th>Iznos</th>
                                                    <th>Akcija</th>
                                                    <th>Status</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($porudzbine as $single) : ?>
                                                <tr>
                                                    <td><?php echo $single->order_id; ?></td>
                                                    <td><?php echo $single->created; ?></td>
                                                    <td><?php echo $single->fname . " " . $single->lname; ?></td>
                                                    <td><?php echo $single->email; ?></td>
                                                    <td><?php echo $single->phone; ?></td>
                                                    <td><?php echo $single->address; ?></td>
                                                    <td><?php echo $single->delivery_adress; ?></td>
                                                    <td><?php echo $single->grand_total; ?></td>
                                                    <td><a href="porudzbina.php?order_id=<?php echo $single->order_id; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                                                    <td><?php echo $single->status; ?></td>                
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

<?php require_once 'inc/bottom.inc.php'; ?>