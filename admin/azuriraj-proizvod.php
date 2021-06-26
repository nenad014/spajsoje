<?php require_once 'inc/top.inc.php'; ?>
<?php
    if(!isset($_SESSION['admin'])) {
        header('Location: index.php');
    } else {
        if(isset($_GET['id'])) {
            $single = $product->show($_GET['id']);
        }
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
                        <li class="breadcrumb-item"><a href="proizvodi.php">Proizvodi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ažuriraj proizvod</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-top">
                        <h3>Dodaj proizvod</h3>
                    </div>
                    <div class="card-body">
                        <form action="update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="text-input" class=" form-control-label">Naziv</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="name" value="<?php echo $single->name; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="text-input" class=" form-control-label">Šifra proizvoda</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="sku" value="<?php echo $single->sku; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Detalji</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="details" id="textarea-input" rows="9" class="form-control"><?php echo $single->details; ?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="text-input" class=" form-control-label">Cena</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="cBalance" name="price" value="<?php echo $single->price; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="file-input" class=" form-control-label">Naslovna fotografija</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="img[]" class="form-control-file">
                                        <br>
                                        <img src="../<?php echo $single->image1; ?>" alt="" width="120" height="180" class="img-thumbnail">
                                        <input type="hidden" name="image1" value="<?php echo str_replace('assets/uploads/', '', $single->image1); ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="file-input" class=" form-control-label">Slika 2</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="img[]" class="form-control-file">
                                        <br>
                                        <img src="../<?php echo $single->image2; ?>" alt="" width="120" height="180" class="img-thumbnail">
                                        <input type="hidden" name="image2" value="<?php echo str_replace('assets/uploads/', '', $single->image2); ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="file-input" class=" form-control-label">Slika 3</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="img[]" class="form-control-file">
                                        <br>
                                        <img src="../<?php echo $single->image3; ?>" alt="" width="120" height="180" class="img-thumbnail">
                                        <input type="hidden" name="image3" value="<?php echo str_replace('assets/uploads/', '', $single->image3); ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Stanje</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                            <option value="Na zalihama">Na zalihama</option>
                                            <option value="Nema na zalihama">Rasprodato</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $single->id; ?>">
                                <input type="submit" class="btn btn-primary" name="updateProductBtn" value="Ažuriraj">
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
        CKEDITOR.replace( 'details' );
    </script>

<?php require_once 'inc/bottom.inc.php'; ?>