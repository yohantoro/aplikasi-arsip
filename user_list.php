<?php

include 'layout_header.php';

$query = "SELECT u.id, u.username, p.nama_depan FROM `user` u LEFT JOIN petugas p ON u.petugas_id = p.id";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Query gagal dijalankan. Error: ' . mysqli_error($con));
}
?>

<h1>Daftar Pengguna</h1>

<p>
    <a href="user_form.php" class="btn btn-success">Buat Pengguna Baru</a>
</p>

<?php if (mysqli_num_rows($result) <= 0): ?>

    <div class="alert alert-danger" role="alert">
        Data kosong
    </div>

<?php else: ?>

<table class="table table-bordered">
    <thead class="thead-dark">
        <th>Username</th>
        <th>Nama Petugas</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['username'] ?></td>
                <td><?= $row['nama_depan'] ?></td>
                <td>
                    <a href="user_detail.php?id=<?= $row['id'] ?>" class="btn btn-info">Detail</a>
                    <a href="user_form.php?id=<?= $row['id'] ?>" class="btn btn-warning">Ubah</a>
                    <a href="user_act_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>

<?php endif; ?>

<?php include 'layout_footer.php'; ?>
