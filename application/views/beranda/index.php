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
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <!-- <li data-target="#demo" data-slide-to="2"></li> -->
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active bg-primary" style="height: 750px;">
                            <!-- <div class="overlay"></div> -->
                            <div class="container">
                                <div class="row ">
                                    <div class="col-md-12 text-center">
                                        <img src="https://corona.demakkab.go.id/mapping_img/2020-05-29/tabel_sebaran.jpeg"
                                            alt="" class="img-fluid " style="height: 750px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item bg-success" style="height: 750px">
                            <!-- <div class="overlay"></div> -->
                            <div class="container">
                                <div class="row slider-text px-4 d-flex align-items-center justify-content-center">
                                    <div class="col-md-12 text-center">
                                        <img src="https://corona.demakkab.go.id/mapping_img/2020-05-29/peta_sebaran.jpeg"
                                            alt="" class="img-fluid " style="height: 750px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="carousel-item bg-warning" style="height: 750px">
									<div class="container">
										<div
											class="row slider-text px-4 d-flex align-items-center justify-content-center">
											<div class="col-md-8 text w-100 text-center">
												<h2 class="mb-4">Get Smash Free UI Kit</h2>
												<p><a href="#" class="btn btn-outline-white btn-round">See all
														components</a></p>
											</div>
										</div>
									</div>
								</div> -->
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
            <div class="col-md-9 text-center">
                <h2 class="heading-section mb-4 pb-md-3">
                    Himbauan
                </h2>
                <p>
                    Menghadapi saudara-saudara kita yang mudik ke Demak dari daerah lain maka diminta :

                    Pemudik wajib melapor kepada RT/ RW setempat untuk diteruskan kepada kepala desa dan bidan
                    desa setempat.
                    Berdasarkan laporan tsb *Petugas kesehatan akan mengunjungi rumah saudara untuk dilakukan
                    pemantauan/ pemeriksaan kesehatan.
                    Warga sekitar harap tetap tenang dan membantu memberikan informasi kepada bidan desa
                    setempat dan pemerintah desa, bila ada tetangga yg berasal dr luar daerah.
                    Kepada para pemudik agar melaksanakan karantina mandiri di rumah masing2 selama 14 hari*
                    sejak kedatangan.
                    Gugus Tugas Percepatan Pengendalian Covid-19 Kabupaten Demak
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
                        <li data-target="#video" data-slide-to="0" class="active"></li>
                        <li data-target="#video" data-slide-to="1"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active bg-primary" style="height: 500px;">
                            <!-- <div class="overlay"></div> -->
                            <div class="container">
                                <div class="row ">
                                    <div class="col-md-12 text-center">
                                        <iframe style="width: 100%;" height="500px"
                                            src="https://www.youtube.com/embed/tMT7jpX42-o" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item bg-success" style="height: 500px">
                            <!-- <div class="overlay"></div> -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <iframe style="width: 100%;" height="500px"
                                            src="https://www.youtube.com/embed/tMT7jpX42-o" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>

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