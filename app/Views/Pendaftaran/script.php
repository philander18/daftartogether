<script>
    function clear_form_peserta() {
        $('#modalnama').val('');
        $('#gender').val('');
        $('#gereja').val('');
        $('#bayar').val('');
    }
    $(document).ready(function() {
        $('#keyword').on('keyup', function() {
            var keyword = $(this).val(),
                page = 1;
            $.ajax({
                url: method_url('home', 'searchDataPeserta'),
                data: {
                    keyword: keyword,
                    page: page,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPendaftaran').html(data);
                }
            });
        });
        $('.modalpeserta').on('click', function() {
            const id = $(this).data('id');
            clear_form_peserta();
            $('#modalnama').prop('disabled', true);
            $('#gender').prop('disabled', true);
            $('#gereja').prop('disabled', true);
            $('#bayar').prop('disabled', true);
            $.ajax({
                url: method_url('Home', 'getdata'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#modalnama').val(data.nama);
                    $('#gender').val(data.gender);
                    $('#gereja').val(data.gereja);
                    $('#bayar').val(data.bayar);
                    $('#id').val(data.id);
                    if (data.pic === null) {
                        $('#pic').html('Belum Dibayar');
                    } else {
                        $('#pic').html('Penerima : ' + data.pic);
                    }
                }
            });
        });
        $(".linkD").on('click', function() {
            var page = $(this).data('page'),
                keyword = $('#keyword').val();
            $.ajax({
                url: method_url('home', 'searchDataPeserta'),
                data: {
                    keyword: keyword,
                    page: page,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.tabelDataPendaftaran').html(data);
                }
            });
        });
    });
</script>