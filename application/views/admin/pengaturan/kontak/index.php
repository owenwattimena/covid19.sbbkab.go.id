<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kontak</h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-tambah btn-primary ml-auto d-block" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Text</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" action="<?= base_url('/api/postKontak') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="0">
                    <div class="form-group">
                        <label for="type">Tipe</label>
                        <select class="custom-select" id="type" name="type">
                            <option value="null" selected>--Pilih Tipe--</option>
                            <option value="kontak">Kontak</option>
                            <option value="sosmed">Sosial media</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" aria-describedby="emailHelp"
                            placeholder="fa fa-home">
                        <small><a href="https://fontawesome.com/icons?d=gallery" target="_blank">Klik disini untuk
                                melihat
                                icon</a></small>
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <input type="text" class="form-control" id="text" name="text" aria-describedby="emailHelp"
                            placeholder="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-submit btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
showDataTable();

function showDataTable() {
    let url = `<?= base_url('/api/getKontak') ?>`;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            let template = '';
            if (response.length > 0) {
                response.forEach(element => {
                    template += `<tr class='tb-row'>`;
                    template += `<td>#</td>`;
                    template += `<td class='tipe' data-tipe="${element.type}">${element.type}</td>`;
                    template +=
                        `<td class='icon' data-icon="${element.icon}"><i class='${element.icon}' ></i></td>`;
                    template += `<td class='text' data-text="${element.text}">${element.text}</td>`;
                    template +=
                        `<td>
                            <button data-id="${element.id}" class="btn-ubah btn badge badge-warning" data-toggle="modal"
                    data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                            <button data-id="${element.id}" class="remove btn badge badge-danger"><i class="fa fa-trash"></i></button>
                        </td>`;
                    template += `</tr>`
                });
            } else {
                template += `<tr class='tb-row'>`;
                template += `<td colspan="5" class="text-center">Tidak ada data</td>`;
                template += `</tr>`;

            }

            $('#data').html(template);
        }
    });
}
$(document).ready(function() {

    $(document).on('click', '.btn-tambah', function() {
        $('.modal-title').text('Tambah Kontak');
        $('.btn-submit').text('Tambah');

        $('#id').val(0);
        $('#type').val('null');
        $('#icon').val('');
        $('#text').val('');
    })

    $(document).on('click', '.btn-ubah', function() {
        $('.modal-title').text('Ubah Kontak');
        $('.btn-submit').text('Ubah');

        let tipe = $(this).parent().parent().find('.tipe').data('tipe');
        let icon = $(this).parent().parent().find('.icon').data('icon');
        let text = $(this).parent().parent().find('.text').data('text');

        $('#id').val($(this).data('id'));
        $('#type').val(tipe);
        $('#icon').val(icon);
        $('#text').val(text);

        console.log(tipe);

    })

    $(document).on('click', '.remove', function() {
        if (confirm('Yakin ingin menghapus data?')) {
            let url = `<?= base_url('/api/removeData') ?>`;

            let id = $(this).data('id');
            let table = 'kontak';
            removeData(id, table, url).done(function(response) {
                if (response.status == 'success') {
                    showDataTable();
                }
            });
        }
    })

    $('#form').submit(function(e) {
        e.preventDefault();

        let tipe = $('#type').val();

        console.log(tipe);

        if (tipe == 'null') {
            showToast('error', 'type tidak boleh kosong');
            return;
        }

        let form = new FormData(this);
        let url = $('#form').attr('action');
        postData(url, form).done(function(response) {
            console.log(response);
            if (response.status == 'success') {
                showDataTable();
            }
        })
    })
});
</script>