<?php require_once 'inc/top.inc.php'; ?>

<?php
    if(!isset($_SESSION['admin'])) {
        header('Location: ../index.php');
    }
?>

<?php require_once 'inc/sidebar.inc.php'; ?>

<!-- Page Content  -->
<div id="content">

<?php require_once 'inc/navbar.inc.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dodaj blog post</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-top">
                        <h3>Dodaj blog post</h3>
                    </div>
                    <div class="card-body">
                        <form action="add.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="text-input" class=" form-control-label">Naslov</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="title" placeholder="Naslov" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Tekst bloga</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="body" id="textarea-input" rows="9" placeholder="Tekst bloga..." class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="file-input" class=" form-control-label">Naslovna slika</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="image" class="form-control-file" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="" class="form-control-label">Datum</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" name="created" placeholder="Datum" class="form-control" required>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" name="addPostBtn" value="Dodaj">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'body' );
    </script>

<?php require_once 'inc/bottom.inc.php'; ?>