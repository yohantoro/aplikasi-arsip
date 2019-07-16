<?php
require_once 'layout_header.php';

/**
 * Jika ada request $_GET['id'], @var $id diisi $_GET['id']
 * Jika tidak, diisi angka 0 (nol)
 */
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT * FROM petugas WHERE `id` = " . $id;
$result = mysqli_query($con, $query);

if (!$result) { // jika query gagal
    /* Aplikasi berhenti dan menampilkan error */
    die(mysqli_error($con));
}

?>

<div class="petugas-list">
    <h1>Detail Petugas</h1>

    <?php if (mysqli_num_rows($result) <= 0): ?>
        <div class="alert alert-danger" role="alert">
            Data tidak ditemukan!
        </div>
    <?php else:
        $data = mysqli_fetch_assoc($result);
    ?>
        <p>
            <a href="petugas_list.php" class="btn btn-sm btn-secondary">Kembali ke Daftar Petugas</a>
            <a href="petugas_form.php?id=<?= $id ?>" class="btn btn-sm btn-warning">Ubah</a>
            <a href="petugas_act_delete.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
        </p>

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
