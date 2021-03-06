<?php

$CI = &get_instance();
$CI->load->model('general_model');
$kontak = $CI->general_model->get_where('kontak', ['type' => 'kontak']);
$sosmed = $CI->general_model->get_where('kontak', ['type' => 'sosmed']);
$pengaturan = $CI->general_model->get('pengaturan');

?>

</section>

<footer class="ftco-section ftco-section-2 bg-dark">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <ul>
                    <li>
                        <h5 class="text-sandybrown">Kontak</h5>
                    </li>
                    <?php foreach ($kontak as $key => $value) :  ?>
                    <li> <i class="<?= $value->icon ?>"></i> <?= $value->text ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-4">
                <ul>
                    <li>
                        <h5 class="text-sandybrown">Media Sosial</h5>
                    </li>
                    <?php foreach ($sosmed as $key => $value) : ?>
                    <li> <i class="<?= $value->icon ?>"></i>
                        <?= $value->text ?></>
                        <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="bg-darknes copy-right py-3 text-center">
    Copyright &copy; <?= date('Y') ?> . <p class="mb-0 pb-0"><?= $pengaturan ? $pengaturan[0]->footer : '' ?></p>
</div>

</div>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" /></svg></div>


<script src="<?= base_url() ?>/assets/site/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/popper.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/jquery.easing.1.3.js"></script>
<script src="<?= base_url() ?>/assets/site/js/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/jquery.stellar.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/aos.js"></script>

<script src="<?= base_url() ?>/assets/site/js/nouislider.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/moment-with-locales.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?= base_url() ?>/assets/site/js/main.js"></script>

<script>
$('.carousel').carousel({
    interval: false,
});
</script>
</body>

</html>