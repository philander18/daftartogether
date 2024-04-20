<script>
    $(document).ready(function() {
        $('#keyword').on('keyup', function() {
            var keyword = $(this).val(),
                page = 1;
            $.ajax({
                url: method_url('home', 'searchdata'),
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
        $(".linkD").on('click', function() {
            var page = $(this).data('page'),
                keyword = $('#keyword').val();
            $.ajax({
                url: method_url('home', 'searchdata'),
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