</div>
<!-- ./wrapper -->

<!-- loading -->
<div id="ajax-loader" class="text-center center d-none" style="
    background-color: rgba(0,0,0,0.3);
    position: fixed; 
    top: 0; bottom: 0;
    right: 0; left: 0; 
    z-index: 3000;">
    <img style="position: absolute; top: 50%; margin-top: -70px"
        src="<?= base_url('/assets/admin/img/ajax-loader.gif') ?>" alt="">
</div>



<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('/assets/admin') ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('/assets/admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('/assets/admin') ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('/assets/admin') ?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('/assets/admin') ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('/assets/admin') ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('/assets/admin') ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('/assets/admin') ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('/assets/admin') ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('/assets/admin') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="<?= base_url('/assets/admin') ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('/assets/admin') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
</script>
<!-- DataTables -->
<script src="<?= base_url('/assets/admin') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('/assets/admin') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('/assets/admin') ?>/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('/assets/admin') ?>/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('/assets/admin') ?>/dist/js/demo.js"></script>
<!-- <script src="<?= base_url('/assets/admin') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> -->
<!-- <script src="<?= base_url('/assets/admin') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->

<!-- SweetAlert2 -->
<script src="<?= base_url('/assets/admin') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('/assets/admin') ?>/plugins/toastr/toastr.min.js"></script>

<script>
$(function() {
    $("#example1").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

});

// var loader = function() {
//     setTimeout(function() {
//         if ($('#ftco-loader').length > 0) {
//             $('#ftco-loader').removeClass('show');
//         }
//     }, 1);
// };
// loader();

function showToast(icon, title) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    Toast.fire({
        icon: icon,
        title: title
    })
}

function postData(url, formData) {

    $('#ajax-loader').removeClass('d-none');

    // let url = $('#form').attr('action');
    return $.ajax({
        url: url,
        type: "POST",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
            $('#ajax-loader').addClass('d-none');
            if (response.status == 'success') {
                showToast('success', 'Data berhasil di simpan!');
                $('#exampleModal').modal('hide')
                // showDataTable();
            } else {
                showToast('error', 'Data gagal di simpan!');
            }
        }
    });
}


function removeData(id, table, url) {
    $('#ajax-loader').removeClass('d-none');

    let data = new FormData();
    data.append('table', table);
    data.append('id', id);
    return $.ajax({
        url: url,
        type: "POST",
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
            $('#ajax-loader').addClass('d-none');

            if (response.status == 'success') {
                showToast('success', 'Data berhasil di hapus!');

                // $('#exampleModal').modal('hide')
                // showDataTable();
            } else {
                showToast('error', 'Data gagal di hapus!');
            }
        }
    });
}
</script>
</body>

</html>