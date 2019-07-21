<?php

include 'layout_header.php';

/**
 * Jika ada request $_GET['id'], @var $id diisi $_GET['id']
 * Jika tidak, diisi angka 0 (nol)
 */
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT * FROM surat_keluar WHERE `id` = " . $id;
$result = mysqli_query($con, $query);

if ($result == false) { // jika query gagal
    /* Aplikasi berhenti dan menampilkan error */
    die(mysqli_error($con));
}

?>

<div class="surat-masuk-list">
    <h1>Detail Surat Keluar</h1>

    <?php if (mysqli_num_rows($result) <= 0): ?>
        <div class="alert alert-danger" role="alert">
            Data tidak ditemukan!
        </div>
    <?php else:
        $data = mysqli_fetch_assoc($result);
    ?>
        <p>
            <a href="smasuk_list.php" class="btn btn-sm btn-secondary">Kembali ke Daftar Surat Keluar</a>
            <a href="smasuk_form.php?id=<?= $id ?>" class="btn btn-sm btn-warning">Ubah</a>
            <a href="smasuk_act_delete.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
        </p>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>No. Agenda</th>
                    <td><?= $data['no_agenda'] ?></td>
                </tr>
                <tr>
                    <th>No. Surat</th>
                    <td><?= $data['no_surat'] ?></td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td><?= $data['pengirim'] ?></td>
                </tr>
                <tr>
                    <th>Tgl. Kirim</th>
                    <td><?= $data['tgl_kirim'] ?></td>
                </tr>
                <tr>
                    <th>Penerima</th>
                    <td><?= $data['penerima'] ?></td>
                </tr>
                <tr>
                    <th>Tgl. Terima</th>
                    <td><?= $data['tgl_terima'] ?></td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td><?= $data['perihal'] ?></td>
                </tr>
            </tbody>
        </table>

    <?php endif; ?>
</div>

<?php include 'layout_footer.php'; ?>
