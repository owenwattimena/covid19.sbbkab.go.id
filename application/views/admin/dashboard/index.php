<?php
$CI = &get_instance();
$CI->load->library('covid');
?>

<!-- Small boxes (Stat box) -->

<div class="row">

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <small><i class="ion-ios-calendar-outline"></i>
                    <?= (empty($otg)) ? 'Belum ada data' : $CI->covid->generateDateTime($otg[0]->created_at)  ?></small>
                <h3><?= (empty($otg)) ? 0 : $otg[0]->dalam_pemantauan + $otg[0]->selesai_pemantauan  ?> OTG</h3>

                <p>Orang Tanpa Gejalah (OTG)</p>
            </div>
            <div class="icon">
                <i class="fa fa-head-side-mask"></i>
            </div>
            <a href="<?= base_url('/admin/covid19/orang-tanpa-gejalah') ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <small><i class="ion-ios-calendar-outline"></i>
                    <?= (empty($odp)) ? 'Belum ada data' : $CI->covid->generateDateTime($odp[0]->created_at)  ?></small>

                <h3><?= (empty($odp)) ? 0 : $odp[0]->proses_pemantauan + $odp[0]->selesai_pemantauan  ?> ODP</h3>

                <p>Orang Dalam Pemantauan (ODP)</p>
            </div>
            <div class="icon">
                <i class="fa fa-head-side-cough"></i>
            </div>
            <a href="<?= base_url('/admin/covid19/orang-dalam-pemantauan') ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <small><i class="ion-ios-calendar-outline"></i>
                    <?= (empty($pdp)) ? 'Belum ada data' : $CI->covid->generateDateTime($pdp[0]->created_at)  ?></small>

                <h3><?= (empty($pdp)) ? 0 : ($pdp[0]->dalam_pengawasan + $pdp[0]->dirawat_diluar + $pdp[0]->meninggal_tanpa_hasil_lab + $pdp[0]->selesai_pengawasan + $pdp[0]->negatif)  ?>
                    Pasien</h3>

                <p>Pasien Dalam Pengawasan (PDP)</p>
            </div>
            <div class="icon">
                <i class="fa fa-hospital-user"></i>
            </div>
            <a href="<?= base_url('/admin/covid19/pasien-dalam-pengawasan') ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <small><i class="ion-ios-calendar-outline"></i>
                    <?= (empty($positif)) ? 'Belum ada data' : $CI->covid->generateDateTime($positif[0]->created_at)  ?></small>

                <h3><?= (empty($positif)) ? 0 : ($positif[0]->dirawat_didalam_rs + $positif[0]->dirawat_diluar_rs) + $positif[0]->isolasi_dirumah + $positif[0]->meninggal + $positif[0]->kembali + $positif[0]->sembuh ?>
                    Kasus
                </h3>

                <p>Positif Covid-19</p>
            </div>
            <div class="icon">
                <i class="fa fa-procedures"></i>
            </div>
            <a href="<?= base_url('/admin/covid19/positif-covid19') ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->