<?php

include 'layout_header.php';

$username = '';
$petugas_id = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = 'user_act_update.php';
    $judul = 'Ubah Data Pengguna';
    $required = '';
} else {
    $id = 0;
    $action = 'user_act_create.php';
    $judul = 'Buat Pengguna Baru';
    $required = 'required';
}

$query = "SELECT * FROM user u WHERE u.id = " . $id;
$result = mysqli_query($con, $query);

if (!$result) {
    die(mysqli_error($con)); // Aplikasi berhenti dan menampilkan error
}
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $username = $user['username'];
    $petugas_id = null;
}

$petugasQuery = "SELECT * FROM petugas";
$resultPetugas = mysqli_query($con, $petugasQuery);

?>

<h1><?= $judul ?></h1>

<p>
    <a href="user_list.php" class="btn btn-secondary btn-sm">Kembali ke Daftar Pengguna</a>
</p>

<div class="card card-body">
    <form class="" action="<?= $action ?>" method="post">

        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="form-group">
            <label for="">Petugas</label>
            <select class="form-control" name="petugas_id">

                <?php if (mysqli_num_rows($resultPetugas) > 0): ?>

                    <option value="" disabled>Pilih Petugas</option>

                    <?php while ($petugas = mysqli_fetch_assoc($resultPetugas)): ?>
                        <option value="<?= $petugas['id'] ?>" <?= $petugas['id'] == $user['petugas_id'] ? 'selected' : '' ?>>
                            <?= $petugas['nama_depan'] . ' ' . $petugas['nama_belakang'] ?>
                        </option>
                    <?php endwhile; ?>

                <?php else: ?>

                    <option value="" disabled>Pilih Petugas</option>

                <?php endif; ?>

            </select>
        </div>

        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" value="<?= $username ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Kata Sandi</label>
            <input type="password" name="password" value="" class="form-control" <?= $required ?>>
        </div>

        <button type="submit" name="button" class="btn btn-info">Simpan</button>
    </form>
</div>

<?php include 'layout_footer.php'; ?>
