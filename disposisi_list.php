<?php
require_once 'layout_header.php';

$query = "SELECT d.id as d_id, d.*, s.* FROM disposisi d LEFT JOIN surat_masuk s ON d.surat_id = s.id";
$result = mysqli_query($con, $query);

// echo "<pre>";var_dump(mysqli_fetch_assoc($result)); exit;

?>

<div class="petugas-list">
    <h1>Daftar Disposisi</h1>

    <p>
        <a href="disposisi_form.php" class="btn btn-success">Buat Baru</a>
    </p>

    <?php if (mysqli_num_rows($result) <= 0): ?>

        <div class="alert alert-danger" role="alert">
            Tidak ada data yang ditemukan!
        </div>

    <?php else: ?>

        <table class="table table-bordered">
            <thead class="thead-dark text-center">
                <th>No. Surat</th>
                <th>Tujuan</th>
                <th>Sifat</th>
                <th>Batas Waktu</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $data['no_surat'] ?></td>
                        <td><?= $data['tujuan'] ?></td>
                        <td><?= $data['sifat'] ?></td>
                        <td><?= $data['batas_waktu'] ?></td>
                        <td class="text-right">
                            <a href="disposisi_detail.php?id=<?= $data['d_id'] ?>" class="btn btn-sm btn-info">Detail</a>
                            <a href="disposisi_form.php?id=<?= $data['d_id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
                            <a href="disposisi_act_delete.php?id=<?= $data['d_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <?php endif; ?>
</div>

<?php require_once 'layout_footer.php' ?>
