<?php
require_once 'layout_header.php';

$id = $_GET['id'];
$query = "SELECT * FROM petugas WHERE `id` = " . $id;

$result = mysqli_query($con, $query);

?>

<div class="petugas-list">
    <h1>Detail Petugas</h1>

    <p>
        <a href="petugas_list.php" class="btn btn-secondary">Kembali ke Daftar Petugas</a>
        <a href="petugas_form.php?id=<?= $id ?>" class="btn btn-warning">Ubah</a>
        <a href="#" class="btn btn-danger">Hapus</a>
    </p>

    <?php if (mysqli_num_rows($result) <= 0): ?>

        <div class="alert alert-danger" role="alert">
            Data tidak ditemukan!
        </div>

    <?php else:
        $data = mysqli_fetch_assoc($result);
    ?>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nama Depan</th>
                    <td><?= $data['nama_depan'] ?></td>
                </tr>
                <tr>
                    <th>Nama Belakang</th>
                    <td><?= $data['nama_belakang'] ?></td>
                </tr>
            </tbody>
        </table>

    <?php endif; ?>
</div>

<?php require_once 'layout_footer.php' ?>
