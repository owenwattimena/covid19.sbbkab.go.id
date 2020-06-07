<!-- Small boxes (Stat box) -->
<?php /*var_dump($pengaturan[0]->id);
die; */ ?>
<div class="row">
    <div class="col-sm-12">
        <?php if ($this->session->flashdata()) : ?>
        <?= $this->session->flashdata('alert') ?>
        <?php endif; ?>

        <form id="form" action="<?= base_url('/admin/ubah_halaman') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $pengaturan ? $pengaturan[0]->id : 0 ?>">
            <div class="card  mb-3">
                <div class="card-header">Pengaturan halaman</div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <label for="nama_website">Nama Website</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="site_title" id="nama_website" class="form-control"
                                placeholder="Nama Website" value="<?= $pengaturan ? $pengaturan[0]->site_title : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <label for="logo">Logo</label>
                        </div>
                        <div class="col-sm-8">
                            <img id="logo-show" width="200"
                                src="<?= (isset($pengaturan[0]->logo) && $pengaturan[0]->logo != null) ? base_url('/uploads/pengaturan/img/' . $pengaturan[0]->logo) : base_url('/uploads/pengaturan/img/logo-default.jpg') ?>"
                                class="rounded mx-auto d-block" alt="...">
                            <input type="file" name="logo" id="logo" class="form-control mt-2">
                            <small>Ukuran Max. 1MB</small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <label for="banner_source">Gambar bener</label>
                        </div>
                        <div class="col-sm-8">
                            <img id="banner-show"
                                src="<?= isset($pengaturan[0]->banner_source) && $pengaturan[0]->banner_source != null ? base_url('/uploads/pengaturan/img/' . $pengaturan[0]->banner_source) : base_url('/uploads/pengaturan/img/banner-default.jpg') ?>"
                                class="rounded mx-auto d-block img-fluid" alt="...">
                            <input type="file" name="banner_source" id="banner_source" class="form-control mt-2">
                            <small>Ukuran Max. 1MB</small>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <label for="banner_title">Judul bener 1</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="banner_title" id="banner_title" class="form-control"
                                placeholder="Judul Baner 1"
                                value="<?= $pengaturan ? $pengaturan[0]->banner_title : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <label for="banner_title">Judul bener 2</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="banner_subtitle" id="banner_title" class="form-control"
                                placeholder="Judul Baner 2"
                                value="<?= $pengaturan ? $pengaturan[0]->banner_subtitle : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <label for="footer">Footer</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="footer" id="footer" class="form-control" placeholder="Footer"
                                value="<?= $pengaturan ? $pengaturan[0]->footer : '' ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8 mt-3">
                            <button type="submit" class="btn btn-success btn-block ">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->



<script>
$('#banner_source').on('change', function() {
    let banner_show = $('#banner-show');
    let def_url = `<?= base_url('/uploads/pengaturan/img/banner-default.jpg') ?>`;
    gambar(this, banner_show, def_url);
})

$('#logo').on('change', function() {
    let logo_show = $('#logo-show');
    let def_url = `<?= base_url('/uploads/pengaturan/img/logo-default.jpg') ?>`;
    gambar(this, logo_show, def_url);
})

function gambar(a, show_el, def_url) {

    // console.log(a.files[0]);

    if (a.files && a.files[0]) {
        if (a.files[0].size * 0.001 <= `<?= FILE_UPLOAD_SIZE ?>`) {

            // if()

            var reader = new FileReader();
            reader.onload = function(e) {
                show_el.attr('src', e.target.result);
            }

            reader.readAsDataURL(a.files[0]);
        } else {
            $(a).val('');
            showToast('error', 'Ukuran berkas yang anda coba unggah lebih besar ukuran yang diperbolehkan.')
            show_el.attr('src', def_url);
        }
    }

}


$(document).ready(function() {








})
</script>