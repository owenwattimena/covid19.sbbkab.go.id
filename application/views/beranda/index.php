<?php
$CI = &get_instance();
$CI->load->library('covid');
?>


<section class="hero-wrap" style="background-image: url('<?= base_url() ?>/assets/site/images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row description align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <div class="text">
                    <h2 class="mb-5 text-sandybrown">Kabubaten Seram Bagian Barat Tanggap Covid-19</h2>
                    <p>Pusat Informasi Seputar Covid-19 Di Kabupaten SBB</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section pb-5 goto-here pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-title">
                <h1 class="text-center">Hot Line Covid-19</h1>
            </div>
            <?php foreach ($hotline as $data) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body pb-4 px-4">
                        <h5 class="card-title"><?= $data->nama ?></h5>
                        <span class="bedge badge-pill badge-secondary card-text">
                            <i class="ion-ios-call">
                                <?= $data->no_hp ?>
                            </i>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>

<section class="ftco-section bg-light" id="cards">
    <div class="container">
        <div class="row">

            <?php
            $updated = $info_update[0]->updated_at ?? 0;
            ?>

            <div class=" col-md-12 text-center mb-4">
                <h2 class="heading-title">Data Pantauan Covid-19</h2>
                <h6 class="text-info">Terakhir diperbarui :
                    <?= $CI->covid->generateDateTime($updated) ?></h6>
            </div>

            <?php
            $dalam_pemantauan = $otg[0]->dalam_pemantauan ?? 0;
            $selesai_pemantauan = $otg[0]->selesai_pemantauan ?? 0;
            ?>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card mb-3">
                    <div class="card-header bg-success">
                        Orang Tanpa Gejalah (OTG)
                    </div>
                    <div class="card-body">
                        <h5 class="card-title position-relative text-sandybrown">Dalam Pemantauan : <span
                                class="position-absolute right text-sandybrown"><?= $dalam_pemantauan ?></span>
                        </h5>
                        <p class="card-text position-relative">Selesai pemantauan : <span
                                class="position-absolute right"><?= $selesai_pemantauan  ?></span>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h5 class="position-relative text-success">

                            Total OTG : <span
                                class="position-absolute right text-success"><?= $dalam_pemantauan + $selesai_pemantauan ?></span>
                        </h5>
                    </div>
                </div>

                <?php
                $odp_proses_pemantauan = $odp[0]->proses_pemantauan ?? 0;
                $odp_selesai_pemantauan = $odp[0]->selesai_pemantauan ?? 0;
                ?>

                <div class="card">
                    <div class="card-header bg-primary">
                        Orang Dalam Pemantauan (ODP)
                    </div>
                    <div class="card-body">
                        <h5 class="card-title position-relative text-sandybrown">Proses Pemantauan : <span
                                class="position-absolute right text-sandybrown"><?= $odp_proses_pemantauan ?></span>
                        </h5>
                        <p class="card-text position-relative">Selesai Pemantauan : <span
                                class="position-absolute right"> <?= $odp_selesai_pemantauan ?> </span>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h5 class="position-relative text-primary">

                            Total ODP : <span
                                class="position-absolute right text-primary"><?= $odp_proses_pemantauan + $odp_selesai_pemantauan ?></span>
                        </h5>
                    </div>
                </div>
            </div>

            <?php
            $pdp_dalam_pengawasan           = $pdp[0]->dalam_pengawasan ?? 0;
            $pdp_dirawat_diluar             = $pdp[0]->dirawat_diluar ?? 0;
            $pdp_meniggal_tanpa_hasil_lab   = $pdp[0]->meninggal_tanpa_hasil_lab ?? 0;
            $pdp_selesai_pengawasan         = $pdp[0]->selesai_pengawasan ?? 0;
            $pdp_negatif                    = $pdp[0]->negatif ?? 0;
            ?>


            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header bg-warning">
                        Pasien Dalam Pengawasan (PDP)
                    </div>
                    <div class="card-body">
                        <h5 class="card-title position-relative text-sandybrown">Dalam Pengawasan :
                            <span class="position-absolute right text-sandybrown"><?= $pdp_dalam_pengawasan ?></span>
                        </h5>
                        <h5 class="card-title position-relative text-sandybrown">Dirawat di luar SBB : <span
                                class="position-absolute right text-sandybrown"><?= $pdp_dirawat_diluar ?></span>
                        </h5>
                        <p class="card-text m-0 position-relative">Meninggal tanpa hasil lab : <span
                                class="position-absolute right"><?= $pdp_meniggal_tanpa_hasil_lab ?></span>
                        </p>
                        <p class="card-text m-0 position-relative">Selesai Pengawasan : <span
                                class="position-absolute right"><?= $pdp_selesai_pengawasan ?></span>
                        </p>
                        <p class="card-text position-relative">Negatif : <span
                                class="position-absolute right"><?= $pdp_negatif ?></span>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h5 class="position-relative text-warning">
                            Total Pasien :
                            <span class="position-absolute right text-warning">
                                <?= $pdp_dalam_pengawasan + $pdp_dirawat_diluar + $pdp_meniggal_tanpa_hasil_lab + $pdp_selesai_pengawasan + $pdp_negatif ?>
                            </span>

                        </h5>
                    </div>
                </div>
            </div>

            <?php
            $positif_dirawat_didalam_rs     = $positif[0]->dirawat_didalam_rs ?? 0;
            $positif_dirawat_diluar_rs     = $positif[0]->dirawat_diluar_rs ?? 0;
            $positif_isolasi_dirumah     = $positif[0]->isolasi_dirumah ?? 0;
            $positif_meninggal     = $positif[0]->meninggal ?? 0;
            $positif_kembali     = $positif[0]->kembali ?? 0;
            $positif_sembuh     = $positif[0]->sembuh ?? 0;
            ?>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header bg-danger">
                        Positif Covid-19
                    </div>
                    <div class="card-body">
                        <h5 class="card-title position-relative text-sandybrown">Dirawat di RS SBB :
                            <span
                                class="position-absolute right text-sandybrown"><?= $positif_dirawat_didalam_rs ?></span>
                        </h5>
                        <h5 class="card-title position-relative text-sandybrown">Dirawat di luar RS SBB : <span
                                class="position-absolute right text-sandybrown"><?= $positif_dirawat_diluar_rs ?></span>
                        </h5>
                        <h5 class="card-title position-relative text-sandybrown">Isolasi di Rumah : <span
                                class="position-absolute right text-sandybrown"><?= $positif_isolasi_dirumah ?></span>
                        </h5>
                        <p class="card-text m-0 position-relative">Meninggal : <span
                                class="position-absolute right"><?= $positif_meninggal ?></span>
                        </p>
                        <p class="card-text m-0 position-relative">Kembali : <span
                                class="position-absolute right"><?= $positif_kembali ?></span>
                        </p>
                        <p class="card-text position-relative">Sembuh : <span
                                class="position-absolute right"><?= $positif_sembuh ?></span>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h5 class="position-relative text-danger">
                            Total Kasus :
                            <span class="position-absolute right text-danger">
                                <?= $positif_dirawat_didalam_rs + $positif_dirawat_diluar_rs + $positif_isolasi_dirumah + $positif_meninggal + $positif_kembali + $positif_sembuh ?>
                            </span>

                        </h5>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- - - - - -end- - - - -  -->

<section class="ftco-section ftco-no-pt ftco-no-pb" id="carousel">
    <div class="container-fluid px-0">
        <div class="row no-gutters justify-content-center">
            <div class="col-md-12">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php for ($i = 0; $i < count($media_image); $i++) : ?>
                        <li data-target="#demo" data-slide-to="<?= $i ?>" class="<?= ($i == 0) ? 'active' : '' ?>"></li>
                        <?php endfor; ?>

                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <style>
                        .carousel-item,
                        .carousel-item img {
                            height: 650px;
                        }

                        @media only screen and (max-width :480px) {

                            .carousel-item,
                            .carousel-item img {
                                height: 400px;
                            }

                        }
                        </style>
                        <?php foreach ($media_image as $key => $value) : ?>
                        <div class="carousel-item <?= $key == 0 ? 'active' : '' ?> bg-primary">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-md-12 text-center">
                                        <img src="<?= base_url('/uploads/media/gambar/' . $value->source) ?>" alt=""
                                            class="img-fluid ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="ion-ios-arrow-round-back"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- - - - - -end- - - - -  -->

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h2 class="heading-section mb-4 pb-md-3 text-center">
                    Himbauan
                </h2>
                <p>
                    <?= $himbauan[0]->text ?? '' ?>
                </p>

            </div>
        </div>
    </div>
</section>

<!-- - - - - -end- - - - -  -->
<section class="ftco-section bg-light" id="carousel">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2 class="heading-section mb-4 pb-md-3">
                    Video
                </h2>
                <div id="video" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php foreach ($media_video as $key => $value) : ?>
                        <li data-target="#video" data-slide-to="<?= $key ?>" class="<?= $key == 0 ? 'active' : '' ?>">
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">

                        <?php foreach ($media_video as $key => $value) : ?>
                        <div class="carousel-item <?= $key == 0 ? 'active' : '' ?> bg-primary" style="height: 500px;">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-md-12 text-center">
                                        <iframe style="width: 100%;" height="500px"
                                            src="https://www.youtube.com/embed/<?= $value->source ?>" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#video" data-slide="prev">
                        <span class="ion-ios-arrow-round-back"></span>
                    </a>
                    <a class="carousel-control-next" href="#video" data-slide="next">
                        <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- - - - - -end- - - - -  -->