<?php

include 'layout_header.php';

$surat_id = '';
$tujuan = '';
$isi_disposisi = '';
$sifat = '';
$batas_waktu = '';
$catatan = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = 'disposisi_act_update.php';
    $judul = 'Ubah Data Disposisi';
    $required = '';
} else {
    $id = 0;
    $action = 'disposisi_act_create.php';
    $judul = 'Buat Disposisi Baru';
    $required = 'required';
}

$query = "SELECT * FROM disposisi d WHERE d.id = " . $id;
$result = mysqli_query($con, $query);

if (!$result) {
    die(mysqli_error($con)); // Aplikasi berhenti dan menampilkan error
}
if (mysqli_num_rows($result) > 0) {
    $disposisi = mysqli_fetch_assoc($result);

    $surat_id = $disposisi['surat_id'];
    $tujuan = $disposisi['tujuan'];
    $isi_disposisi = $disposisi['isi_disposisi'];
    $sifat = $disposisi['sifat'];
    $batas_waktu = $disposisi['batas_waktu'];
    $catatan = $disposisi['catatan'];
}

$suratMasukQuery = "SELECT * FROM surat_masuk";
$resultSurat = mysqli_query($con, $suratMasukQuery);

?>

<h1><?= $judul ?></h1>

<p>
    <a href="disposisi_list.php" class="btn btn-secondary btn-sm">Kembali ke Daftar Disposisi</a>
</p>

<div class="card card-body">
    <form class="" action="<?= $action ?>" method="post">

        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="form-group">
            <label for="">Surat Masuk</label>
            <select class="form-control" name="surat_id">

                <?php if (mysqli_num_rows($resultSurat) > 0): ?>

                    <option value="" class="text-secondary">Pilih Surat</option>

                    <?php while ($surat = mysqli_fetch_assoc($resultSurat)): ?>
                        <option value="<?= $surat['id'] ?>" <?= $surat['id'] == $surat_id ? 'selected' : '' ?>>
                            <?= $surat['no_surat'] ?>
                        </option>
                    <?php endwhile; ?>

                <?php else: ?>

                    <option value="" disabled>Pilih Surat</option>

                <?php endif; ?>

            </select>
        </div>


        <div class="form-group">
            <label for="">Tujuan</label>
            <input type="text" name="tujuan" value="<?= $tujuan ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Isi Disposisi</label>
            <input type="text" name="isi_disposisi" value="<?= $isi_disposisi ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Sifat</label>
            <input type="text" name="sifat" value="<?= $sifat ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Batas Waktu</label>
            <input type="text" name="batas_waktu" value="<?= $batas_waktu ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Catatan</label>
            <input type="text" name="catatan" value="<?= $catatan ?>" class="form-control">
        </div>

        <button type="submit" name="button" class="btn btn-info">Simpan</button>
    </form>
</div>

<?php include 'layout_footer.php'; ?>
