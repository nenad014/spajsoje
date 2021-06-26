<?php require_once 'inc/top.inc.php'; ?>
<?php
    if(isset($_SESSION['admin'])) {
        if(isset($_GET['u_id'])) {
            $single = $user->show($_GET['u_id']);
            $orders = $order->getByUser($_GET['u_id']);
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
                                    <li class="breadcrumb-item"><a href="users.php">Korisnici</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Korisnik <?php echo $single->username; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-top px-3">
                                    <h3>
                                        <i class="fa fa-user"></i> Korisnik <?php echo $single->username; ?>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-borderless">
                                        <tr>
                                            <td><strong>Korisničko ime: </strong></td>
                                            <td><?php echo $single->username; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>email: </strong></td>
                                            <td><?php echo $single->email; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Porudžbine</strong></td>
                                            <td><?php echo count($orders); ?>  <a href="user-orders.php?u_id=<?php echo $single->u_id; ?>" class="btn btn-info">Vidi sve</a></td>
                                        </tr>
                                    </table> 
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

<?php require_once 'inc/bottom.inc.php'; ?>