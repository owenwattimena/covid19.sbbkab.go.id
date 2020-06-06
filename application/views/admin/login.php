<section class="ftco-section ftco-section-2 section-signup page-header img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <div class="card card-login py-4">
                    <form class="form-login" method="post" action="<?= base_url('/auth/login') ?>">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Login</h4>
                            <?php if ($this->session->flashdata()) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('login_error') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body px-4 pb-4 pt-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ion-ios-contact"></i>
                                    </span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ion-ios-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password...">
                            </div>

                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-white">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>