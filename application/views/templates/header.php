<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon"
        href="<?= (isset($pengaturan[0]->logo) && $pengaturan[0]->logo != null) ? base_url('/uploads/pengaturan/img/' . $pengaturan[0]->logo) : base_url('/uploads/pengaturan/img/logo-default.jpg') ?>">
    <title>
        <?= (isset($pengaturan[0]->site_title) && $pengaturan[0]->site_title != null) ? $pengaturan[0]->site_title : '' ?>
        | Covid 19 - Seram Bagian Barat</title>
    <meta name="description"
        content="Informasi Corona Virus Disease 2019 (COVID-19) di Kabupaten Seram Bagian Barat (SBB).">
    <meta name="keywords"
        content="Corona SBB, Covid SBB, Corona Seram Bagian Barat, Covid Seram Bagian Barat, Corona Virus Disease 2019 SBB, COVID-19 SBB, Seram Bagian Barat, SBB, Provinsi Maluku, Indonesia">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/animate.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/aos.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/nouislider.css">


    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/site/css/style.me.css">

    <link rel="stylesheet" href="<?= base_url('/assets/admin') ?>/plugins/fontawesome-free/css/all.min.css">


    <script src="<?= base_url() ?>/assets/site/js/jquery.min.js"></script>

</head>

<body>
    <div class="main-section">