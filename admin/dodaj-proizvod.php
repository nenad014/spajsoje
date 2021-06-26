<?php require_once 'inc/top.inc.php'; ?>
<?php
    if(!isset($_SESSION['admin'])) {
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
                        <li class="breadcrumb-item"><a href="proizvodi.php">Proizvodi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dodaj proizvod</li>
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
                        <form action="add.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="text-input" class=" form-control-label">Naziv</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="name" placeholder="Naziv" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="text-input" class=" form-control-label">Šifra proizvoda</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="product_no" placeholder="Šifra proizvoda" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Detalji</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="details" id="textarea-input" rows="9" placeholder="Detalji..." class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="text-input" class=" form-control-label">Cena</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="cBalance" name="price" placeholder="Cena" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="file-input" class=" form-control-label">Naslovna fotografija</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="img[]" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="file-input" class=" form-control-label">Slika 2</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="img[]" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="file-input" class=" form-control-label">Slika 3</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="img[]" class="form-control-file">
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
                                <input type="submit" class="btn btn-primary" name="addProductBtn" value="Dodaj">
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