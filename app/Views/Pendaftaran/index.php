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
                <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama" required>
            </div>
            <div class="mb-2">
                <input class="form-control" type="text" id="hp" name="hp" placeholder="Nomor HP" required>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <label for="gender" class="pt-2">Jenis Kelamin</label>
                </div>
                <div class="col-8">
                    <select class="form-select" id="gender" name="gender" aria-label="Jenis Kelamin">
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
                    <select class="form-select" id="gereja" name="gereja" aria-label="Gereja">
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
                <div class="container-fluid text-start">
                    <label class="text-dark d-inline">
                        Search :
                    </label>
                    <input class="form-control form-control-sm d-inline mr-3" type="search" style="background: rgba(255, 255, 255, 0.5); width:200px" id="keyword" name="keyword">
                </div>
                <div class="container-fluid mt-2 tabelDataPendaftaran">
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
                                        <a href="" class="link-primary modalpanitia" data-bs-toggle="modal" data-bs-target="#formpanitia" data-id="<?= $row["id"]; ?>" name="nama" id="nama">
                                            <?= $row["nama"]; ?>
                                        </a>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1" style="width: 30%;">
                                        <?php if (is_null($row['bayar'])) : ?>
                                            <i class="fas fa-circle-xmark" id="status"></i>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>