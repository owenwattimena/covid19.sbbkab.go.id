<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar riwayat positif Covid-19 </h3>

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
                                <th>Tanggal update</th>
                                <th>Dirawat didalam</th>
                                <th>Dirawat diluar</th>
                                <th>Isolasi di rumah</th>
                                <th>Meninggal</th>
                                <th>Kembali</th>
                                <th>Sembuh</th>
                                <th>Di Update Oleh</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data" data-positif_url="<?= base_url('/api/getPositif') ?>">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Tanggal update</th>
                                <th>Dirawat didalam</th>
                                <th>Dirawat diluar</th>
                                <th>Isolasi di rumah</th>
                                <th>Meninggal</th>
                                <th>Kembali</th>
                                <th>Sembuh</th>
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
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Positif Covid-19 Terbaru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST" action="<?= base_url('/api/postPositif') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dirawat_didalam_rs">Dirawat di dalam</label>
                        <input required type="number" min="0" name="dirawat_didalam_rs" class="form-control"
                            id="dirawat_didalam_rs">

                    </div>
                    <div class="form-group">
                        <label for="dirawat_diluar_rs">Dirawat di luar</label>
                        <input required type="number" min="0" name="dirawat_diluar_rs" class="form-control"
                            id="dirawat_diluar_rs">
                    </div>
                    <div class="form-group">
                        <label for="isolasi_dirumah">Isolasi di rumah</label>
                        <input required type="number" min="0" name="isolasi_dirumah" class="form-control"
                            id="isolasi_dirumah">
                    </div>
                    <div class="form-group">
                        <label for="meninggal">Meninggal</label>
                        <input required type="number" min="0" name="meninggal" class="form-control" id="meninggal">
                    </div>
                    <div class="form-group">
                        <label for="kembali">Kembali</label>
                        <input required type="number" min="0" name="kembali" class="form-control" id="kembali">
                    </div>
                    <div class="form-group">
                        <label for="sembuh">Sembuh</label>
                        <input required type="number" min="0" name="sembuh" class="form-control" id="sembuh">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Update +Covid</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
showDataTable();

function showDataTable() {
    let url = $('#data').data('positif_url');
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
                template += `<td>${element.created_at}</td>`;
                template += `<td>${element.dirawat_didalam_rs}</td>`;
                template += `<td>${element.dirawat_diluar_rs}</td>`;
                template += `<td>${element.isolasi_dirumah}</td>`;
                template += `<td>${element.meninggal}</td>`;
                template += `<td>${element.kembali}</td>`;
                template += `<td>${element.sembuh}</td>`;
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
            let table = 'positif_covid';
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