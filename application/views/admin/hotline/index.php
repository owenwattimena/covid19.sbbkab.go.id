<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar saluran telepon cepat</h3>

                <button type="button" class="btn-create btn btn-primary ml-auto d-block" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="table" data-rm-hotline="<?= base_url('/api/removeData') ?>">
                <div class="table-responsive">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Di buat</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data" data-hotline_url="<?= base_url('/api/getHotline') ?>">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Di buat</th>
                                <th>aksi</th>
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
            <form id="form" method="POST" action="<?= base_url('/api/postHotline') ?>">
                <input type="hidden" id="hidden-id" name="id" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input required type="text" name="nama" value class="form-control" id="nama">

                    </div>
                    <div class="form-group">
                        <label for="no_hp">Telepon</label>
                        <input required type="tel" name="no_hp" value class="form-control" id="no_hp">
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
    let url = $('#data').data('hotline_url');
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
            let template = '';

            response.forEach(element => {
                template += `<tr class='tb-row'>`;
                template += `<td>#</td>`;
                template += `<td class="nama">${element.nama}</td>`;
                template += `<td class="no_hp">${element.no_hp}</td>`;
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

$(document).ready(function() {

    $(document).on('click', '.btn-create', function() {
        $('.modal-title').text('Tambah Hotline')
        $('.btn-submit').text('Tambah')
        // set id, nama, no_hp to default value
        $('#hidden-id').val(0);
        $('#nama').val('');
        $('#no_hp').val('');
    })

    $(document).on('click', '.btn-update', function() {
        $('.modal-title').text('Update Hotline')
        $('.btn-submit').text('Update')
        let nama = $(this).parent().parent().find('.nama').text();
        let no_hp = $(this).parent().parent().find('.no_hp').text();
        // set id, nama, no_hp by id
        $('#nama').val(nama);
        $('#no_hp').val(no_hp);
        $('#hidden-id').val($(this).data('id'));
    })

    // remove data
    $(document).on('click', '.btn-remove', function() {
        if (confirm('Yakin ingin menghapus data?')) {
            let url = $('#table').data('rm-hotline');

            let id = $(this).data('id');
            let table = 'hotline';
            removeData(id, table, url).done(function(response) {
                if (response.status == 'success') {
                    showDataTable();
                }
            });
        }
    })

    $('#form').submit(function(e) {
        e.preventDefault();
        let form = new FormData(this);
        let url = $('#form').attr('action');
        postData(url, form).done(function(response) {
            if (response.status == 'success') {
                showDataTable();
            }
        })
    });


})
</script>