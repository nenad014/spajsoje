<?php require_once 'inc/top.inc.php'; ?>
<?php
    if(isset($_SESSION['admin'])) {
        if(isset($_GET['r_id'])) {
            $recept = $recipe->show($_GET['r_id']);
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
                                    <li class="breadcrumb-item"><a href="recepti.php">Recepti</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $recept->r_name; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-top px-3">
                                    <h3>
                                        <i class="fa fa-users"></i> <?php echo $recept->r_name; ?>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <img src="../<?php echo $recept->r_image; ?>" class="img-fluid">
                                        <br><br>
                                        <i class="far fa-calendar-alt"></i> <?php echo $recept->r_created_at; ?>
                                        <br><br>
                                        <p class="text-justify"><?php echo $recept->r_body; ?></p>
                                        <br>
                                        <br>
                                        <a href="azuriraj-recept.php?r_id=<?php echo $recept->r_id; ?>" class="btn btn-warning"><i class="fas fa-edit">Uredi</i></a>
                                        <a href="remove.php?r_id=<?php echo $recept->r_id; ?>" class="btn btn-danger"><i class="fas fa-trash-alt">Ukloni</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

<?php require_once 'inc/bottom.inc.php'; ?>