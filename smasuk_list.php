<?php

include 'layout_header.php';

$query = "SELECT * FROM surat_masuk";
$hasil = mysqli_query($con, $query);

if ($hasil == false) {
    die('Query gagal dijalankan. Error: ' . mysqli_error($con));
}

?>

<h1>Daftar Surat Masuk</h1>

<p>
    <a href="smasuk_form.php" class="btn btn-primary">Buat Data Baru</a>
</p>

<?php if (mysqli_num_rows($hasil) <= 0): ?>

    <div class="alert alert-danger" role="alert">
        Data kosong
    </div>

<?php else: ?>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <th>No Agenda</th>
            <th>No Surat</th>
            <th>Tgl. Kirim</th>
            <th>Pengirim</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($hasil)) : ?>
                <tr>
                    <td><?php echo $row['no_agenda'] ?></td>
                    <td><?php echo $row['no_surat'] ?></td>
                    <td><?php echo $row['tgl_kirim'] ?></td>
                    <td><?php echo $row['pengirim'] ?></td>
                    <td>
                        <a href="smasuk_detail.php?id=<?= $row['id'] ?>" class="btn btn-info">Detail</a>
                        <a href="smasuk_form.php?id=<?= $row['id'] ?>" class="btn btn-warning">Ubah</a>
                        <a href="smasuk_act_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<?php endif; ?>

<?php include 'layout_footer.php'; ?>
