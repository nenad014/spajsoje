<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-bars"></i>
                        <span>Prikaži/Sakrij meni</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <?php if(isset($_SESSION['admin'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Odjavi se</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>