<?php
require_once 'layout_header.php';

$id = $_GET['id'];
$query = "SELECT * FROM petugas WHERE `id` = " . $id;

$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);

$namaDepan = $data['nama_depan'];
$namaBelakang = $data['nama_belakang'];

?>

<div class="petugas-form">
    <h1>Data Petugas</h1>

    <form action="petugas_action.php" method="post">
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
