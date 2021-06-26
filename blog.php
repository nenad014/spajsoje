<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
<?php
    $postovi = $blog->index();
    $posts = $blog->latest();
?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Blog</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="vs-blog-wrapper space-top space-md-bottom" id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <?php foreach($postovi as $single) : ?>
                        <div class="vs-blog blog-grid grid-wide">
                            <div class="blog-img image-scale-hover">
                                <a href="blog-post.php?blog_id=<?php echo $single->blog_id; ?>"><img src="<?php echo $single->cover_img; ?>" alt="Blog Image" class="w-100" /></a>
                            </div>
                            <div class="blog-content">
                                <h4 class="blog-title fw-semibold"><a href="blog-post.php?blog_id=<?php echo $single->blog_id; ?>"><?php echo $single->title; ?></a></h4>
                                <div class="blog-meta"><a href="blog-post.php?blog_id=<?php echo $single->blog_id; ?>"><?php echo $single->created_at; ?></a></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <aside class="sidebar-area">
                            <div class="widget">
                                <h3 class="widget_title">Poslednje objave</h3>
                                <div class="vs-widget-recent-post">
                                <?php foreach($posts as $post) : ?>
                                    <div class="recent-post d-flex align-items-center">
                                        <div class="media-img"><img src="<?php echo $post->cover_img; ?>" width="100" height="73" alt="Recent Post Image" /></div>
                                        <div class="media-body pl-30">
                                            <h4 class="recent-post-title h5 mb-0"><a href="blog-post.php?blog_id=<?php echo $post->blog_id; ?>"><?php echo $post->title; ?></a></h4>
                                            <a href="blog-post.php?blog_id=<?php echo $post->blog_id; ?>" class="text-theme fs-12"><?php echo $post->created_at; ?></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>

<?php require_once 'inc/bottom.php'; ?>