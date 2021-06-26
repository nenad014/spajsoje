<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
<?php $recepti = $recipe->index(); ?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Recepti</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active">Recepti</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="vs-blog-wrapper space-top space-md-bottom" id="blog">
            <div class="container">
                <div class="row">
                    <?php foreach($recepti as $single) : ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="vs-blog blog-grid">
                            <div class="blog-img image-scale-hover">
                                <a href="recept.php?r_id=<?php echo $single->r_id; ?>"><img src="<?php echo $single->r_image; ?>" alt="Recept slika" class="w-100" /></a>
                            </div>
                            <div class="blog-content">
                                <h4 class="blog-title fw-semibold"><a href="recept.php?r_id=<?php echo $single->r_id; ?>"><?php echo $single->r_name; ?></a></h4>
                                <div class="blog-meta"><a href="recept.php?r_id=<?php echo $single->r_id; ?>"><?php echo $single->r_created_at; ?></a></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

<?php require_once 'inc/bottom.php'; ?>