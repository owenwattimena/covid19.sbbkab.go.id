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
            <div class="card-body" id="table" data-rm-user="<?= base_url('/api/removeUser') ?>">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="data" data-users="<?= base_url('/api/getUsers') ?>">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th></th>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST" action="<?= base_url('/api/postUsers') ?>">
                <input type="hidden" id="hidden-id" name="id" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input required type="text" min="0" name="nama" class="form-control" id="nama">

                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required type="text" min="0" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" min="0" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="ulang-password">Ulang Password</label>
                        <input required type="password" min="0" name="ulang-password" class="form-control"
                            id="ulang-password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ubah-->
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-ubah" method="POST" action="<?= base_url('/api/postUsers') ?>">
                <input type="hidden" id="hidden-id_ubah" name="id" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ubah_nama">Nama</label>
                        <input required type="text" min="0" name="nama" class="form-control" id="ubah_nama">
                        <small class="text-danger"></small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Ubah User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-password" method="POST" action="<?= base_url('/api/ubahPassword') ?>">
                <input type="hidden" id="hidden-id_password" name="id" value="0">
                <div class="modal-body">
                    <small class="text-danger"></small>

                    <div class="form-group">
                        <label for="password_password">Password</label>
                        <input required type="password" name="password" placeholder="Masukan Password anda"
                            class="form-control" id="password_password">
                        <div class=" form-group">
                            <label for="password-baru">Password Baru</label>
                            <input required type="password" name="password-baru" class="form-control"
                                id="password-baru">
                        </div>
                        <div class="form-group">
                            <label for="password_ulang-password">Ulang Password</label>
                            <input required type="password" min="0" name="ulang-password" class="form-control"
                                id="password_ulang-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-secondary">Ubah Password</button>
                    </div>
            </form>
        </div>
    </div>
</div>


<script>
let current_user = `<?= $this->session->user->id ?>`;
showDataTable();

function showDataTable() {
    let url = $('#data').data('users');
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
                if (current_user == element.id) {
                    template += `<td><i class="fa fa-key text-warning"></i></td>`;
                    // template += `<td>#</td>`;
                } else {
                    template += `<td>#</td>`;
                }
                template += `<td class="nama">${element.nama}</td>`;
                template += `<td class="username">${element.username}</td>`;
                template += `<td class="roles">${element.roles}</td>`;
                template += `<td>
                                <button data-id="${element.id}" class="btn btn-ubah badge badge-warning" data-toggle="modal"
                    data-target="#ubahModal"><i class="fa fa-edit"></i> Ubah</button>
                                <button data-id="${element.id}" class="remove btn badge badge-danger"><i class="fa fa-trash"></i> Hapus</button>
                                <button data-id="${element.id}" class="btn-ubah-password btn badge badge-primary" data-toggle="modal"
                    data-target="#passwordModal"><i class="fa fa-key"></i> Ubah password</button>
                            </td>`;
                template += `</tr>`;
            });

            $('#data').html(template);
        }
    });



}



$(document).ready(function() {


    $(document).on('click', '.remove', function() {
        if (confirm('Yakin ingin menghapus data?')) {



            let url = $('#table').data('rm-user');

            let id = $(this).data('id');
            let table = 'users';
            if (current_user == id) {
                if (!confirm('ada akan menghapus akun milik anda!?')) {
                    return;
                }
            }
            ajaxStart();
            let data = new FormData();
            data.append('id', id);
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response) {
                    ajaxStop();
                    if (response.status == 'success') {
                        showDataTable();
                        showToast('success', 'Data berhasil di hapus!');
                        if (current_user == id) {
                            window.location.href = `<?= base_url('/auth/logout') ?>`;
                        }
                    } else {
                        showToast('error', 'Data gagal di hapus!');
                    }
                }
            });
        }
    })
    $(document).on('click', '.btn-ubah', function() {
        let nama = $(this).parent().parent().find('.nama').text();
        let username = $(this).parent().parent().find('.username').text();

        $('#ubahModal #hidden-id_ubah').val($(this).data('id'));
        $('#ubahModal #ubah_nama').val(nama);

        if (current_user == $(this).data('id')) {
            $('#form-ubah small').text('*Ini adalah nama dari akun user anda');
        } else {
            $('#form-ubah small').text('');
        }
    })

    $(document).on('click', '.btn-ubah-password', function() {


        $('#passwordModal #hidden-id_password').val($(this).data('id'));

        $('#passwordModal #password_password').val('');
        $('#passwordModal #password-baru').val('');
        $('#passwordModal #password_ulang-password').val('');

        if (current_user == $(this).data('id')) {
            $('#form-password small').text('*Ini adalah akun user anda');
        } else {
            $('#form-password small').text('');
        }
    })

    $('#form').submit(function(e) {
        e.preventDefault();

        let password = $('#password').val();
        let ulang_password = $('#ulang-password').val();
        console.log(password)
        console.log(ulang_password)
        if (password != ulang_password) {
            showToast('error', 'password tidak sama dengan ulang password')
        } else {
            let form = new FormData(this);
            let url = $('#form').attr('action');
            postData(url, form).done(function(response) {
                console.log(response)
                if (response.status == 'success') {
                    showDataTable();
                } else {
                    showToast('error', response.message)
                }
            })
        }
    });

    $('#form-ubah').submit(function(e) {
        let id = $('#hidden-id_ubah').val();

        e.preventDefault();
        let form = new FormData(this);
        let url = $('#form-ubah').attr('action');
        postData(url, form).done(function(response) {
            console.log(response)
            if (response.status == 'success') {
                showDataTable();
                $('#ubahModal').modal('hide')
                if (current_user == id) {
                    window.location.href = `<?= base_url('/auth/logout') ?>`;
                }

            } else {
                showToast('error', response.message)
            }
        })

    });

    $('#form-password').submit(function(e) {
        e.preventDefault();
        let id = $('#hidden-id_password').val();

        let password = $('#password-baru').val();
        let ulang_password = $('#password_ulang-password').val();
        console.log(password)
        console.log(ulang_password)
        if (password != ulang_password) {
            showToast('error', 'password tidak sama dengan ulang password');
        } else {

            let form = new FormData(this);
            let url = $(this).attr('action');

            postData(url, form).done(function(response) {
                console.log(response)
                if (response.status == 'success') {
                    showDataTable();
                    $('#passwordModal').modal('hide')
                    if (current_user == id) {
                        window.location.href = `<?= base_url('/auth/logout') ?>`;
                    }
                    showToast('success', response.message)

                } else {
                    showToast('error', response.message)
                }

            })
        }

    });


})
</script>