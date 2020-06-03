<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar riwayat orang dalam pemantauan </h3>
                <button type="button" class="btn btn-primary ml-auto d-block" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="table" data-rm-covid="<?= base_url('/api/removeData') ?>">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Update</th>
                                <th>Proses Pemantauan</th>
                                <th>Selesai Pemantauan</th>
                                <th>Di Update Oleh</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data" data-odp_url="<?= base_url('/api/getODP') ?>">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Update</th>
                                <th>Proses Pemantauan</th>
                                <th>Selesai Pemantauan</th>
                                <th>Di Update Oleh</th>
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
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Data ODP Terbaru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST" action="<?= base_url('/api/postODP') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="proses_pemantauan">Proses Pemantauan</label>
                        <input required type="number" min="0" name="proses_pemantauan" class="form-control"
                            id="proses_pemantauan">

                    </div>
                    <div class="form-group">
                        <label for="selesai_pemantauan">Selesai Pemantauan</label>
                        <input required type="number" min="0" name="selesai_pemantauan" class="form-control"
                            id="selesai_pemantauan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update ODP</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
showDataTable();

function showDataTable() {
    let url = $('#data').data('odp_url');
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
                template += `<td>${element.created_at}</td>`;
                template += `<td>${element.proses_pemantauan}</td>`;
                template += `<td>${element.selesai_pemantauan}</td>`;
                template += `<td>${element.nama}</td>`;
                template +=
                    `<td><button data-id="${element.id}" class="remove btn badge badge-danger"><i class="fa fa-trash"></i></button></td>`;
                template += `</tr>`;
            });

            $('#data').html(template);
        }
    });



}



$(document).ready(function() {


    $(document).on('click', '.remove', function() {
        if (confirm('Yakin ingin menghapus data?')) {
            let url = $('#table').data('rm-covid');

            let id = $(this).data('id');
            let table = 'odp';
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