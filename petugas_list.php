<?php
require_once 'layout_header.php';

$query = "SELECT * FROM petugas";
$result = mysqli_query($con, $query);

$no = 0;
?>

<div class="petugas-list">
    <h1>Daftar Petugas</h1>

    <p>
        <a href="petugas_form.php" class="btn btn-success">Buat Baru</a>
    </p>

    <?php if (mysqli_num_rows($result) <= 0): ?>

        <div class="alert alert-danger" role="alert">
            Tidak ada data yang ditemukan!
        </div>

    <?php else: ?>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <th>No.</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($result)): $no++; ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['nama_depan'] ?></td>
                        <td><?= $data['nama_belakang'] ?></td>
                        <td>
                            <a href="petugas_detail.php?id=<?= $data['id'] ?>" class="btn btn-info">Detail</a>
                            <a href="petugas_form.php?id=<?= $data['id'] ?>" class="btn btn-warning">Ubah</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <?php endif; ?>
</div>

<?php require_once 'layout_footer.php' ?>
