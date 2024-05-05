<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container konten-daftar">
    <div class="daftar">
        <form autocomplete="off" action="" method="POST">
            <img src="<?= base_url(); ?>public/images/together1.png" class="img-fluid">
            <h3>Pendaftaran Ibadah Padang</h3>
            <h3>Pelprap GPdI Wilayah 1</h3>
            <div class="flash">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert" style="padding: 6px 12px; margin-bottom: 8px;">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="my-2">
                <input class="form-control" type="text" name="nama" placeholder="Nama" required>
            </div>
            <div class="mb-2">
                <input class="form-control" type="text" name="hp" placeholder="Nomor HP" required>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <label for="gender" class="pt-2">Jenis Kelamin</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="gender" aria-label="Jenis Kelamin">
                        <option value="Laki-laki" selected>Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <label for="gereja" class="pt-2">Gereja</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="gereja" aria-label="Gereja">
                        <?php foreach ($listgereja as $gereja) : ?>
                            <option value="<?= $gereja['nama']; ?>"><?= $gereja['nama']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary text-dark fw-bold" style="width: 100%">Submit</button>
                </div>
            </div>
        </form>
        <h6 style="text-align: left;">Catatan :</h6>
        <ol style="text-align: left; margin-left: -20px">
            <li>
                <p align="justify" class="mb-0">Biaya pendaftaran minimal Rp 50.000,-/orang. Bila tergerak untuk memberi sumbangan kasih, boleh transfer lebih dari nominal tersebut.</p>
            </li>
            <li>
                <p align="justify" class="mb-0">Pembayaran dilakukan via transfer ke rekening BCA <b>8105982441 a.n. Hadasa Maretisa Susanto</b> dan melakukan konfirmasi pembayaran ke nomor <b>085659133234</b>.</p>
            </li>
            <li>
                <p align="justify" class="mb-0">Peserta yang sudah selesai melakukan pendaftaran dan pembayaran akan dimasukkan ke dalam grup Whatsapp Ibadah Padang Wilayah 1 sesuai nomor HP yang tercantum di atas, guna mendapatkan informasi dan mempermudah koordinasi.</p>
            </li>
        </ol>
    </div>
    <div class="detail">
        <div class="row justify-content-center">
            <div class="col">
                <div class="container text-start p-0">
                    <label class="text-dark d-inline">
                        Search :
                    </label>
                    <input class="form-control form-control-sm d-inline mr-3" type="search" style="background: rgba(255, 255, 255, 0.5); width:200px" id="keyword" name="keyword">
                </div>
                <div class="container mt-2 tabelDataPendaftaran p-0">
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
                                        <button class="page-link text-dark linkD" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination['previous']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark linkD" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination['page'] == $number ? 'active' : '' ?>">
                                        <button class="page-link text-dark linkD" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </button>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination['next']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark linkD" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination['last']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark linkD" aria-label="<?= $last; ?>" id="last" name="last" data-page="<?= $last; ?>">
                                            <span aria-hidden="true"><?= $last; ?></span>
                                        </button>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                    <h5 class="text-black text-start" style="text-shadow: 2px 2px white;">Jumlah Data : <?= $jumlah; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="formpeserta" tabindex="-1" aria-labelledby="judulpeserta" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-primary" id="judulpeserta">Data Pendaftaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding-top:2px;">
                <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                    <label class="text-dark fw-bold ms-2 mb-2" id="pic" name="pic">Belum dibayar</label>
                </div>
                <table class="table table-borderless" style="margin-bottom: 0px;">
                    <tr>
                        <div class="form-group">
                            <td style="width: 30%;">
                                <label for="modalnama" class="fw-bold">Nama</label>
                            </td>
                            <td style="width: 70%;">
                                <input class="form-control form-control-sm" type="text" id="modalnama" name="modalnama">
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <td style="width: 30%;">
                                <label for="gender" class="fw-bold">Jenis Kelamin</label>
                            </td>
                            <td style="width: 70%;">
                                <select class="form-select" aria-label=".form-select-sm example" name="gender" id="gender">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <td style="width: 30%;">
                                <label for="gereja" class="fw-bold">Gereja</label>
                            </td>
                            <td style="width: 70%;">
                                <select class="form-select" aria-label=".form-select-sm example" name="gereja" id="gereja">
                                    <?php foreach ($listgereja as $gereja) : ?>
                                        <option value="<?= $gereja['nama']; ?>"><?= $gereja['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <td style="width: 30%;">
                                <label for="bayar" class="fw-bold">Bayar</label>
                            </td>
                            <td style="width: 70%;">
                                <input class="form-control form-control-sm" type="text" id="bayar" name="bayar">
                            </td>
                        </div>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>