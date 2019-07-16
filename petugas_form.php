<?php
require_once 'layout_header.php';

$namaDepan = '';
$namaBelakang = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = 'petugas_act_update.php';
    $judul = 'Ubah Data Petugas';
} else {
    $id = 0;
    $action = 'petugas_act_create.php';
    $judul = 'Buat Data Petugas';
}

$query = "SELECT * FROM petugas WHERE `id` = " . $id;
$result = mysqli_query($con, $query);
if (!$result) { // jika query gagal
    die(mysqli_error($con)); // Aplikasi berhenti dan menampilkan error
}

/* Jika query berhasil dan datanya tidak kosong */
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        $namaDepan = $data['nama_depan'];
        $namaBelakang = $data['nama_belakang'];
    }
}

?>

<div class="petugas-form">
    <h1><?= $judul ?></h1>

    <p>
        <a href="petugas_list.php" class="btn btn-sm btn-secondary">Kembali ke Daftar Petugas</a>
    </p>

    <form action="<?= $action ?>" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="form-group">
            <label for="nama-depan">Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" id="nama-depan" aria-describedby="nama-depan" value="<?= $namaDepan ?>" required>
        </div>

        <div class="form-group">
            <label for="nama-belakang">Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" id="nama-belakang" aria-describedby="nama-belakang" value="<?= $namaBelakang ?>">
            <small id="nama-belakang-help" class="form-text text-muted">Nama belakang boleh dikosongi.</small>
        </div>

        <button type="submit" name="button" class="btn btn-info">Simpan</button>
    </form>
</div>

<?php require_once 'layout_footer.php' ?>
