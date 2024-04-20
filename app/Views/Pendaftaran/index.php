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
            <div class="my-3">
                <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" id="hp" name="hp" placeholder="Nomor HP" required>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="gender" class="pt-2">Jenis Kelamin</label>
                </div>
                <div class="col-8">
                    <select class="form-select gender" aria-label="Jenis Kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="gereja" class="pt-2">Gereja</label>
                </div>
                <div class="col-8">
                    <select class="form-select gereja" aria-label="Gereja">
                        <?php foreach ($listgereja as $gereja) : ?>
                            <option value="<?= $gereja['nama']; ?>"><?= $gereja['nama']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary text-dark fw-bold" style="width: 100%">Submit</button>
                </div>
            </div>
        </form>
        <h6 style="text-align: left;">Note :</h6>
        <p align="justify">Biaya pendaftaran minimal 50K. <br>
            Pembayaran dilakukan via transfer ke rekening BCA 8105982441 a.n. Hadasa Maretisa Susanto dan melakukan konfirmasi pembayaran ke nomor 085659133234. <br>
            Panitia ijin memasukkan nomor HP yang telah selesai pendaftaran dan pembayaran ke grup WA Ibadah Padang Wilayah 1 supaya memudahkan koordinasi</p>

    </div>
    <div class="detail">
        <img src="<?= base_url(); ?>public/images/together1.png" class="img-fluid">
    </div>
</div>
<?= $this->endSection(); ?>