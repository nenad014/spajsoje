<?php require_once 'inc/top.inc.php'; ?>
<?php
    if(isset($_SESSION['admin'])) {
        if(isset($_GET['id'])) {
            $single = $product->show($_GET['id']);
        }
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
                                    <li class="breadcrumb-item"><a href="proizvodi.php">Proizvodi</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $single->name; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-top px-3">
                                    <h3>
                                        <i class="fa fa-users"></i> <?php echo $single->name; ?>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="col-md-6 offset-3">
                                            <img src="../<?php echo $single->image1; ?>" class="img-fluid">
                                        </div>
                                        <div class="col-md-8 offset-md-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../<?php echo $single->image1; ?>" class="img-thumbnail">
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="../<?php echo $single->image2; ?>" class="img-thumbnail">
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="../<?php echo $single->image3; ?>" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br><br>
                                        <p class="text-justify"><?php echo $single->details; ?></p>
                                        <p><strong>Šifra: </strong> <?php echo $single->sku; ?></p>
                                        <p><strong>Cena: </strong> <?php echo $single->price; ?> RSD</p>
                                        <br>
                                        <a href="azuriraj-proizvod.php?id=<?php echo $single->id; ?>" class="btn btn-warning"><i class="fas fa-edit">Uredi</i></a>
                                        <a href="remove.php?id=<?php echo $single->id; ?>" class="btn btn-danger"><i class="fas fa-trash-alt">Ukloni</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

<?php require_once 'inc/bottom.inc.php'; ?>