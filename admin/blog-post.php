<?php require_once 'inc/top.inc.php'; ?>
<?php
    if(isset($_SESSION['admin'])) {
        if(isset($_GET['blog_id'])) {
            $single = $blog->show($_GET['blog_id']);
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
                                    <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $single->title; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-top px-3">
                                    <h3>
                                        <i class="fa fa-users"></i> <?php echo $single->title; ?>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <img src="../<?php echo $single->cover_img; ?>" class="img-fluid">
                                        <br><br>
                                        <i class="far fa-calendar-alt"></i> <?php echo $single->created_at; ?>
                                        <br><br>
                                        <p class="text-justify"><?php echo $single->body; ?></p>
                                        <br>
                                        <br>
                                        <a href="azuriraj-blog-post.php?blog_id=<?php echo $single->blog_id; ?>" class="btn btn-warning"><i class="fas fa-edit">Uredi</i></a>
                                        <a href="remove.php?blog_id=<?php echo $single->blog_id; ?>" class="btn btn-danger"><i class="fas fa-trash-alt">Ukloni</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

<?php require_once 'inc/bottom.inc.php'; ?>