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
        <img src="<?= base_url(); ?>public/images/together1.png" class="img-fluid">
    </div>
</div>
<?= $this->endSection(); ?>