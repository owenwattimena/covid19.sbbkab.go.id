<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="<?= base_url() ?>/assets/site/images/sbblogo.png" width="30" height="30" alt="">
            SBB Tanggap Covid-19</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item"><a href="/" class="nav-link icon d-flex align-items-center"><i class=""></i><span
                            class="ml-2 text-sandybrown">Beranda</span></a></li>

                <li class="nav-item"><a href="<?= base_url('/infografis') ?>"
                        class="nav-link icon d-flex align-items-center"><i class=""></i><span
                            class="ml-2 text-sandybrown">Infografis</span></a></li>

                <li class="nav-item"><a href="<?= base_url('/auth/login') ?>"
                        class="nav-link icon d-flex align-items-center"><i class=""></i><span
                            class="ml-2 text-sandybrown">Login</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->