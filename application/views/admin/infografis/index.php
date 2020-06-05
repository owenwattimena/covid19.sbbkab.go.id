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
                                <th>Sumber</th>
                                <th>Keterangan</th>
                                <th>Dibuat pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
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

            <form class="form" enctype="multipart/form-data" method="POST"
                action="<?= base_url('/api/postInfografis') ?>">

                <div class="modal-body">

                    <input type="hidden" id="hidden-id" name="id" value="0">

                    <div class=" form-group">
                        <label for="source">Gambar</label>
                        <input required type="file" accept="image/*" name="source" value class="form-control"
                            id="source">
                        <small>Dimensi gambar yang disarankan 960x960. Ukuran Max. 1MB </small>
                    </div>
                    <div class="row justify-content-center">

                        <div class="col-sm-6">
                            <img class="img-fluid" id="show-img"
                                src="<?= base_url('/uploads/media/gambar/default.jpg') ?>" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea required class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-submit btn btn-info"></button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
showDataTable();

function showDataTable() {
    let url = `<?= base_url('/api/getInfografis') ?>`;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            let template = '';

            response.forEach(element => {
                template += `<tr class='tb-row'>`;
                template += `<td>#</td>`;
                template +=
                    `<td> <span class="source">${element.source}</span> <a target="_blank" href="${element.source_detail}"><sup><i class="fa fa-external-link-alt"></i></sup></a></td>`;
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


$('#source').on('change', function() {
    gambar(this);
})

function gambar(a) {
    if (a.files && a.files[0]) {
        if (a.files[0].size * 0.001 <= `<?= FILE_UPLOAD_SIZE ?>`) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(a.files[0]);
        } else {
            $('#source').val('');
            showToast('error', 'Ukuran berkas yang anda coba unggah lebih besar ukuran yang diperbolehkan.')
            $('#show-img').attr('src', `<?= base_url('uploads/media/gambar/default.jpg ') ?>`);
        }
    }

}



$(document).ready(function() {

    $(document).on('click', '.btn-create', function() {
        $('.modal-title').text('Tambah Infografis')
        $('.btn-submit').text('Tambah')

        $('#show-img').attr('src', `<?= base_url('uploads/media/gambar/default.jpg ') ?>`);
        // set id, nama, no_hp to default value
        $('#hidden-id').val(0);
        $('#source').val('');
        $('#keterangan').val('');
        $('#source').attr('required', 'required');
    })

    $(document).on('click', '.btn-update', function() {
        $('.modal-title').text('Update Infografis')
        $('.btn-submit').text('Update')

        let source = $(this).parent().parent().find('td .source').text();
        let keterangan = $(this).parent().parent().find('.keterangan').text();
        console.log(source);

        $('#show-img').attr('src', `<?= base_url('/uploads/infografis/') ?>` + source);
        $('#source').removeAttr('required');

        // set id, nama, no_hp by id
        $('#keterangan').val(keterangan);
        $('#hidden-id').val($(this).data('id'));
    })

    // remove data
    $(document).on('click', '.btn-remove', function() {
        if (confirm('Yakin ingin menghapus data?')) {
            let url = `<?= base_url('/api/removeData') ?>`;

            let id = $(this).data('id');
            let table = 'infografis';
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