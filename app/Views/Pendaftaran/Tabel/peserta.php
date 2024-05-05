<table id="tabelDataPendaftaran" class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark">
            <th class="text-center">Nama</th>
            <th class="text-center">Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peserta as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1 text-dark" style="width: 70%;">
                    <a href="" class="link-primary modalpeserta" data-bs-toggle="modal" data-bs-target="#formpeserta" data-id="<?= $row["id"]; ?>" name="nama" id="nama">
                        <?= $row["nama"]; ?>
                    </a>
                </td>
                <td class="text-center align-middle m-1 p-1" style="width: 30%;">
                    <?php if (is_null($row['bayar'])) : ?>
                        <i class="fa-solid fa-circle-xmark" id="status"></i>
                    <?php else : ?>
                        <?= number_format($row["bayar"], 0, ',', '.'); ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($peserta) : ?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($pagination['first']) : ?>
                <li class="page-item">
                    <a class="page-link text-dark linkD" href="#" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </a>
                </li>
            <?php endif ?>
            <?php if ($pagination['previous']) : ?>
                <li class="page-item">
                    <a class="page-link text-dark linkD" href="#" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </a>
                </li>
            <?php endif ?>
            <?php foreach ($pagination['number'] as $number) : ?>
                <li class="page-item <?= $pagination['page'] == $number ? 'active' : '' ?>">
                    <a class="page-link text-dark linkD" href="#" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </a>
                </li>
            <?php endforeach ?>
            <?php if ($pagination['next']) : ?>
                <li class="page-item">
                    <a class="page-link text-dark linkD" href="#" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </a>
                </li>
            <?php endif ?>
            <?php if ($pagination['last']) : ?>
                <li class="page-item">
                    <a class="page-link text-dark linkD" href="#" aria-label="<?= $last; ?>" id="last" name="last" data-page="<?= $last; ?>">
                        <span aria-hidden="true"><?= $last; ?></span>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
<?php endif; ?>
<h5 class="text-black text-start" style="text-shadow: 2px 2px white;">Jumlah Data : <?= $jumlah; ?></h5>
<script>
    $(document).ready(function() {
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