<?php require_once 'inc/top.inc.php'; ?>
<?php
    if(isset($_SESSION['admin'])) {
        if(isset($_GET['r_id'])) {
            $single = $recipe->show($_GET['r_id']);
        }
    } else {
        header('Location: index.php');
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
                        <li class="breadcrumb-item"><a href="recept.php">Recept</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Uredi recept</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-top">
                        <h3>Uredi blog objavu</h3>
                    </div>
                    <div class="card-body">
                        <form action="update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Naslov</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="name" value="<?php echo $single->r_name; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">Naslovna fotografija</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file-input" name="img" class="form-control-file">
                                    <br>
                                    <img src="../<?php echo $single->r_image; ?>" alt="" width="120" height="180" class="img-thumbnail">
                                    <input type="hidden" name="image" value="<?php echo str_replace('assets/uploads/', '', $single->r_image); ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Recept</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="body" id="textarea-input" rows="9" class="form-control"><?php echo $single->r_body; ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="" class="form-control-label">Datum</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" name="created_at" value="<?php echo $single->r_created_at; ?>" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $single->r_id; ?>">
                            <input type="submit" class="btn btn-success" name="updateRecipeBtn" value="Ažuriraj">
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