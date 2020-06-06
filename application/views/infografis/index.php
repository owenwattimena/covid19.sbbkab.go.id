<section class="hero-wrap"
    style="height: 250px;background-image: url('<?= isset($pengaturan[0]->banner_source) && $pengaturan[0]->banner_source != null ? base_url('/uploads/pengaturan/img/' . $pengaturan[0]->banner_source) : base_url('/uploads/pengaturan/img/banner-default.jpg') ?>');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">

    </div>
</section>


<!-- - - - - -end- - - - -  -->

<!-- <section class="ftco-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2 class="heading-section mb-4 pb-md-3">
                    Infografis
                </h2> -->

<section class="ftco-section bg-light" id="carousel">
    <div class="container-fluid px-0">
        <div class="row no-gutters justify-content-center">
            <h2 class="heading-section mb-4 pb-md-3">
                Infografis
            </h2>
            <div class="col-md-12">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php foreach ($infografis as $key => $value) :  ?>
                        <li data-target="#demo" data-slide-to="<?= $key ?>" class="<?= $key == 0 ? 'active' : '' ?>">
                        </li>
                        <?php endforeach; ?>
                        <!-- <li data-target="#demo" data-slide-to="2"></li> -->
                    </ul>
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
                    <!-- The slideshow -->
                    <div class="carousel-inner">

                        <?php foreach ($infografis as $key => $value) :  ?>

                        <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                            <!-- <div class="overlay"></div> -->
                            <div class="container">
                                <div class="row ">
                                    <div class="col-md-12 text-center">
                                        <img src="<?= base_url('/uploads/infografis/') . $value->source ?>" alt=""
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

<!-- <style>
/*
    code by Iatek LLC 2018 - CC 2.0 License - Attribution required
    code customized by Azmind.com
*/
@media (min-width: 768px) and (max-width: 991px) {

    /* Show 4th slide on md if col-md-4*/
    .carousel-inner .active.col-md-4.carousel-item+.carousel-item {
        position: absolute;
        top: 0;
        right: -33.3333%;
        /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}

@media (min-width: 576px) and (max-width: 768px) {

    /* Show 3rd slide on sm if col-sm-6*/
    .carousel-inner .active.col-sm-6.carousel-item {
        position: absolute;
        top: 0;
        right: -50%;
        /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}

@media (min-width: 576px) {
    .carousel-item {
        margin-right: 0;
    }

    /* show 2 items */
    .carousel-inner .active+.carousel-item {
        display: block;
    }

    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item {
        transition: none;
    }

    .carousel-inner .carousel-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }

    /* left or forward direction */
    .active.carousel-item-left+.carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left+.carousel-item,
    .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }

    /* farthest right hidden item must be also positioned for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }

    /* right or prev direction */
    .active.carousel-item-right+.carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right+.carousel-item,
    .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}

/* MD */
@media (min-width: 768px) {

    /* show 3rd of 3 item slide */
    .carousel-inner .active+.carousel-item+.carousel-item {
        display: block;
    }

    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item {
        transition: none;
    }

    .carousel-inner .carousel-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }

    /* left or forward direction */
    .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }

    /* right or prev direction */
    .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}

/* LG */
@media (min-width: 991px) {

    /* show 4th item */
    .carousel-inner .active+.carousel-item+.carousel-item+.carousel-item {
        display: block;
    }

    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item+.carousel-item {
        transition: none;
    }

    /* Show 5th slide on lg if col-lg-3 */
    .carousel-inner .active.col-lg-3.carousel-item+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
        position: absolute;
        top: 0;
        right: -25%;
        /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }

    /* left or forward direction */
    .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }

    /* right or prev direction //t - previous slide direction last item animation fix */
    .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
</style> -->

<!-- Top content -->
<!-- <div class="top-content">
    <div class="container-fluid">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <div class="carousel-item col-12 col-sm-12 col-md-6 active">
                    <img src="http://covid19_sbbkab.test/uploads/media/gambar/ff1c9caf4d8c7174cd669a66ed8324ad.jpeg"
                        class="img-fluid mx-auto d-block" alt="img1">
                </div>

                <div class="carousel-item col-12 col-sm-12 col-md-6">
                    <img src="http://covid19_sbbkab.test/uploads/media/gambar/ff1c9caf4d8c7174cd669a66ed8324ad.jpeg"
                        class="img-fluid mx-auto d-block" alt="img1">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div> -->
<!-- </div>
        </div>
    </div>
</section> -->
<!-- - - - - -end- - - - -  -->


<!-- <script>
$('#carousel-example').on('slide.bs.carousel', function(e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
    */
    console.log('owen')
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 2;
    var totalItems = $('.carousel-item').length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i = 0; i < it; i++) {
            // append slides to end
            if (e.direction == "left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            } else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }

});
</script> -->