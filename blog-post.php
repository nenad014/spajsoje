<?php require_once 'inc/header.php'; ?>

<?php require_once 'inc/nav.inc.php'; ?>
<?php if(isset($_GET['blog_id'])) {
    $single = $blog->show($_GET['blog_id']);
    $posts = $blog->latest();
};
?>
        <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" data-bg-src="assets/img/breadcumb/breadcumb-img-1.jpg">
            <div class="container">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Blog</h1>
                    <ul class="breadcumb-menu-style1 mx-auto">
                        <li><a href="index.php">Početna</a></li>
                        <li class="active">Blog post</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="vs-blog-wrapper blog-details space-top space-md-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <div class="vs-blog blog-single">
                            <div class="blog-header">
                                <h2 class="blog-title h1"><?php echo $single->title; ?></h2>
                            </div>
                            <div class="blog-image">
                                <img src="<?php echo $single->cover_img; ?>" alt="Blog Image" />
                            </div>
                            <div class="blog-content">
                                <?php echo $single->body; ?>
                            </div>
                            <div class="share-links clearfix my-60">
                                <div class="row align-items-xl-center">
									<?php
										$site_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
									?>
                                    <div class="col-sm-6 text-start text-md-end ml-auto">
                                        <span class="fs-xs fw-semibold text-title me-3">Podeli na društvenim mrežama:</span>
                                        <ul class="blog-social list-unstyled">
                                            <li>
												<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?=$site_url?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="https://twitter.com/share?url=<?=$site_url?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$site_url?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related-post-wrapper pt-40">
                            <h2 class="inner-title1 h1">Slične <span class="text-theme">objave</span></h2>
                            <div class="row text-center vs-carousel" data-slide-show="3" data-lg-slide-show="2">
                                <div class="col-lg-4">
                                    <div class="vs-blog blog-grid">
                                        <div class="blog-img image-scale-hover">
                                            <a href="blog-details.html"><img src="assets/img/blog/related-post-1.jpg" alt="Blog Image" class="w-100" /></a>
                                        </div>
                                        <div class="blog-content">
                                            <h4 class="blog-title fw-semibold"><a href="blog-details.html">Keep Your Fruits frash</a></h4>
                                            <div class="blog-meta"><a href="blog-details.html">January 04, 2021</a> <a href="blog-details.html">5 Views</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="vs-blog blog-grid">
                                        <div class="blog-img image-scale-hover">
                                            <a href="blog-details.html"><img src="assets/img/blog/related-post-2.jpg" alt="Blog Image" class="w-100" /></a>
                                        </div>
                                        <div class="blog-content">
                                            <h4 class="blog-title fw-semibold"><a href="blog-details.html">Letrase traner sheets</a></h4>
                                            <div class="blog-meta"><a href="blog-details.html">July 04, 2021</a> <a href="blog-details.html">22 Views</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="vs-blog blog-grid">
                                        <div class="blog-img image-scale-hover">
                                            <a href="blog-details.html"><img src="assets/img/blog/related-post-3.jpg" alt="Blog Image" class="w-100" /></a>
                                        </div>
                                        <div class="blog-content">
                                            <h4 class="blog-title fw-semibold"><a href="blog-details.html">Some cla lorem ipsum</a></h4>
                                            <div class="blog-meta"><a href="blog-details.html">Augest 04, 2021</a> <a href="blog-details.html">12 Views</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <aside class="sidebar-area sticky-sidebar">
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