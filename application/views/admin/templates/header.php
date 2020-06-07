<?php
$CI = &get_instance();
$CI->load->model('general_model');
$pengaturan = $CI->general_model->get('pengaturan');
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon"
        href="<?= (isset($pengaturan[0]->logo) && $pengaturan[0]->logo != null) ? base_url('/uploads/pengaturan/img/' . $pengaturan[0]->logo) : base_url('/uploads/pengaturan/img/logo-default.jpg') ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SBB Siaga Covid19 | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('/assets/admin') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?= base_url('/assets/admin') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('/assets/admin') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <!-- DataTables -->
    <link rel="stylesheet"
        href=".<?= base_url('/assets/admin') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('/assets/admin') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('/assets/admin') ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/assets/admin') ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?= base_url('/assets/admin') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('/assets/admin') ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('/assets/admin') ?>/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?= base_url('/assets/admin') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('/assets/admin') ?>/plugins/toastr/toastr.min.css">



    <!-- jQuery -->
    <script src="<?= base_url('/assets/admin') ?>/plugins/jquery/jquery.min.js"></script>


    <script src="<?= base_url('/assets/admin/css/style.css') ?>"></script>



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">