<?php

include 'layout_header.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$query = "SELECT u.id as u_id, u.username, p.*
    FROM user u
    LEFT JOIN petugas p ON u.petugas_id = p.id
    WHERE u.id = " . $id;
$result = mysqli_query($con, $query);

if ($result == false) { // jika query gagal
    /* Aplikasi berhenti dan menampilkan error */
    die(mysqli_error($con));
}

?>

<h1>Detail Pengguna</h1>

<?php if (mysqli_num_rows($result) <= 0): ?>
    <div class="alert alert-danger" role="alert">
        Data tidak ditemukan!
    </div>
<?php else:
    $data = mysqli_fetch_assoc($result);
?>

<p>
    <a href="user_list.php" class="btn btn-sm btn-secondary">Kembali ke Daftar Surat Masuk</a>
    <a href="user_form.php?id=<?= $data['u_id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
    <a href="user_act_delete.php?id=<?= $data['u_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
</p>

<table class="table table-bordered">
    <tbody>
        <tr>
            <th>Petugas</th>
            <td><?= $data['nama_depan'] . ' ' . $data['nama_belakang'] ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?= $data['username'] ?></td>
        </tr>
    </tbody>
</table>

<?php endif; ?>

<?php include 'layout_footer.php'; ?>
