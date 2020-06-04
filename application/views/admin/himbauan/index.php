<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-sm-12">
        <form id="form" action="<?= base_url('/admin/postHimbauan') ?>" method="post">
            <input type="hidden" id="id-himbauan" name="id" value="0">
            <button type="submit" class="btn btn-primary ml-auto d-block mb-3" data-toggle="modal"
                data-target="#exampleModal">
                <i class="fa fa-save"></i>
            </button>
            <textarea id='editor' name="text">

            </textarea>
            <div class="test"></div>
        </form>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->


<script src="<?= base_url('/assets/admin/') ?>tinymce/tinymce/js/tinymce/tinymce.min.js"></script>

<script>
getHimbauan();

function getHimbauan() {
    $.ajax({
        type: "get",
        url: `<?= base_url('/api/getHimbauan') ?>`,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            if (response.length <= 0) {
                $('#editor').text('');
            } else {
                $('#editor').text(response[0].text);
                $('#id-himbauan').val(response[0].id);
            }
        }
    });
}

$(document).ready(function() {

    tinymce.init({
        selector: '#editor',
        height: 300,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor | codesample',
        image_advtab: true,
        // templates: [{
        //         title: 'Test template 1',
        //         berita: 'Test 1'
        //     },
        //     {
        //         title: 'Test template 2',
        //         berita: 'Test 2'
        //     }
        // ],
        // berita_css: [
        //     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        //     '//www.tinymce.com/css/codepen.min.css'
        // ]
    });

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
        let html = tinymce.get('editor').getContent();
        // let text = $('#editor').html(html);
        let form = new FormData(this);
        form.append('text', html);
        let url = `<?= base_url('/api/postHimbauan') ?>`;
        // console.log(tinymce.get('editor').getContent())


        // $('.test').html(tinymce.get('editor').getContent());
        postData(url, form).done(function(response) {
            console.log(response)
            if (response.status == 'success') {
                let text = $('#editor').text('html');
                // showDataTable();
                // getHimbauan();
            }
        })
    });


})
</script>