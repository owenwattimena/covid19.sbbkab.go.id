<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar media</h3>

                <button type="button" class="btn-create btn btn-primary ml-auto d-block" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="table" data-rm-data="<?= base_url('/api/removeData') ?>">
                <div class="table-responsive">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe</th>
                                <th>Sumber</th>
                                <th>Keterangan</th>
                                <th>Dibuat pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data" data-hotline_url="<?= base_url('/api/getMedia') ?>">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tipe</th>
                                <th>Sumber</th>
                                <th>Keterangan</th>
                                <th>Dibuat pada</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">

                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                    <li class="nav-item nav-img">
                        <a class="nav-link active" id="image-tab" data-toggle="tab" href="#image" role="tab"
                            aria-controls="home" aria-selected="true">Gambar</a>
                    </li>
                    <li class="nav-item nav-video">
                        <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab"
                            aria-controls="profile" aria-selected="false">Video</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="home-tab">

                        <form class="form" enctype="multipart/form-data" method="POST"
                            action="<?= base_url('/api/postMedia') ?>">
                            <input type="hidden" id="hidden-i_id" name="id" value="0">
                            <input type="hidden" name="type" value="image">

                            <div class=" form-group">
                                <label for="source-img">Gambar</label>
                                <input required type="file" accept="image/*" name="source" value class="form-control"
                                    id="source-img">
                                <small>Dimensi gambar yang disarankan 960x960. Ukuran Max. 1MB </small>
                            </div>
                            <div class="row justify-content-center">

                                <div class="col-sm-6">
                                    <img class="img-fluid" id="show-img"
                                        src="<?= base_url('/uploads/media/gambar/default.jpg') ?>" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan-img">Keterangan</label>
                                <textarea required class="form-control" id="keterangan-img" name="keterangan"
                                    rows="3"></textarea>
                            </div>
                            <div class="modal-footer mb-0 pb-0">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn-submit btn btn-info"></button>
                            </div>
                        </form>

                    </div>


                    <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="profile-tab">
                        <form class="form" method="POST" action="<?= base_url('/api/postMedia') ?>">
                            <input type="hidden" id="hidden-v_id" name="id" value="0">
                            <input type="hidden" name="type" value="video">
                            <div class="form-group">
                                <label for="source-video">Video</label>
                                <input required type="text" name="source" placeholder="Id Video YouTube" value
                                    class="form-control" id="source-video">
                                <small>https://www.youtube.com/watch?v=<b class="bg-success">id_video</b></small>
                            </div>
                            <div class="form-group">
                                <label for="keterangan-video">Keterangan</label>
                                <textarea required class="form-control" id="keterangan-video" name="keterangan"
                                    rows="3"></textarea>

                            </div>
                            <div class="modal-footer mb-0 pb-0">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn-submit btn btn-info"></button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>


<script>
showDataTable();

function showDataTable() {
    let url = $('#data').data('hotline_url');
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
            // console.log(response);
            let template = '';

            response.forEach(element => {
                template += `<tr class='tb-row'>`;
                template += `<td>#</td>`;
                template += `<td class="type">${element.type}</td>`;
                template +=
                    `<td class="source">${element.source} <a target="_blank" href="${element.source_detail}"><sup><i class="fa fa-external-link-alt"></i></sup></a></td>`;
                template += `<td class="keterangan">${element.keterangan}</td>`;
                template += `<td>${element.created_at}</td>`;
                template +=
                    `<td>
                        <button data-id="${element.id}" class="btn-update btn badge badge-warning" data-toggle="modal"
                    data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                        <button data-id="${element.id}" class="btn-remove btn badge badge-danger"><i class="fa fa-trash"></i></button>
                    </td>`;
                template += `</tr>`;
            });

            $('#data').html(template);
        }
    });

}


$('#source-img').on('change', function() {
    gambar(this);
})

function gambar(a) {

    // console.log(a.files[0]);

    if (a.files && a.files[0]) {
        if (a.files[0].size * 0.001 <= `<?= FILE_UPLOAD_SIZE ?>`) {

            // if()

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(a.files[0]);
        } else {
            $('#source-img').val('');
            showToast('error', 'Ukuran berkas yang anda coba unggah lebih besar ukuran yang diperbolehkan.')
            $('#show-img').attr('src', `<?= base_url('uploads/media/gambar/default.jpg ') ?>`);
        }
    }

}



$(document).ready(function() {

    $(document).on('click', '.btn-create', function() {
        $('.modal-title').text('Tambah Media')
        $('.btn-submit').text('Tambah')

        $('#show-img').attr('src', `<?= base_url('uploads/media/gambar/default.jpg ') ?>`);
        // set id, nama, no_hp to default value
        $('#hidden-id').val(0);
        $('#source-img').val('');
        $('#source-video').val('');
        $('#keterangan-video').val('');
        $('#keterangan-img').val('');
        $('#no_hp').val('');
        $('.nav-video').removeClass('d-none')
        $('#video').removeClass('d-none')
        $('#source-img').attr('required', 'required');
    })

    $(document).on('click', '.btn-update', function() {
        $('.modal-title').text('Update Media')
        $('.btn-submit').text('Update')

        let type = $(this).parent().parent().find('.type').text();
        let source = $(this).parent().parent().find('.source').text();
        let keterangan = $(this).parent().parent().find('.keterangan').text();
        console.log(type);
        if (type == 'image') {
            $('.nav-img').removeClass('d-none')
            $('#image').removeClass('d-none')

            $('.nav-video').addClass('d-none')
            $('#video').addClass('d-none')

            $('#video-tab').removeClass('active')
            $('#video').removeClass('active show')

            $('#image-tab').addClass('active');
            $('#image').addClass('active show');

            $('#show-img').attr('src', `<?= base_url('/uploads/media/gambar/') ?>` + source);
            $('#source-img').removeAttr('required');

            // set id, nama, no_hp by id
            $('#keterangan-img').val(keterangan);
            $('#hidden-i_id').val($(this).data('id'));
        } else {
            $('.nav-img').addClass('d-none')
            $('#image').addClass('d-none')

            $('.nav-video').removeClass('d-none')
            $('#video').removeClass('d-none')

            //
            $('#image-tab').removeClass('active')
            $('#image').removeClass('active show')

            $('#video-tab').addClass('active');
            $('#video').addClass('active show');
            //

            // set id, nama, no_hp by id
            $('#source-video').val(source);
            $('#keterangan-video').val(keterangan);
            $('#hidden-v_id').val($(this).data('id'));

        }
    })

    // remove data
    $(document).on('click', '.btn-remove', function() {
        if (confirm('Yakin ingin menghapus data?')) {
            let url = $('#table').data('rm-data');

            let id = $(this).data('id');
            let table = 'media';
            removeData(id, table, url).done(function(response) {
                if (response.status == 'success') {
                    showDataTable();
                }
            });
        }
    })

    $('.form').submit(function(e) {
        e.preventDefault();
        // let form = $(this).serializeArray();
        let formData = new FormData(this);
        let url = $('.form').attr('action');
        postData(url, formData).done(function(response) {
            console.log(response);
            if (response.status == 'success') {
                showDataTable();
            } else {
                showToast('error', response.message);
            }
        })
    });


})
</script>