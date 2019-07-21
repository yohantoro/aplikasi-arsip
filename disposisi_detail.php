<?php
require_once 'layout_header.php';

/**
 * Jika ada request $_GET['id'], @var $id diisi $_GET['id']
 * Jika tidak, diisi angka 0 (nol)
 */
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT d.id as d_id, d.*, s.*
    FROM disposisi d
    JOIN surat_masuk s ON d.surat_id = s.id
    WHERE d.id = " . $id;
$result = mysqli_query($con, $query);

if (!$result) { // jika query gagal
    /* Aplikasi berhenti dan menampilkan error */
    die(mysqli_error($con));
}

?>

<div class="petugas-list">
    <h1>Detail Disposisi</h1>

    <?php if (mysqli_num_rows($result) <= 0): ?>
        <div class="alert alert-danger" role="alert">
            Data tidak ditemukan!
        </div>
    <?php else:
        $data = mysqli_fetch_assoc($result);
    ?>
        <p>
            <a href="disposisi_list.php" class="btn btn-sm btn-secondary">Kembali ke Daftar Disposisi</a>
            <a href="disposisi_form.php?id=<?= $data['d_id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
            <a href="disposisi_act_delete.php?id=<?= $data['d_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
        </p>

        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <th colspan="2">Detail Surat Masuk</th>
                    </thead>
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
            </div>
            <div class="col">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <th colspan="2">Detail Disposisi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Tujuan</th>
                            <td><?= $data['tujuan'] ?></td>
                        </tr>
                        <tr>
                            <th>Isi Disposisi</th>
                            <td><?= $data['isi_disposisi'] ?></td>
                        </tr>
                        <tr>
                            <th>Sifat</th>
                            <td><?= $data['sifat'] ?></td>
                        </tr>
                        <tr>
                            <th>Batas Waktu</th>
                            <td><?= $data['batas_waktu'] ?></td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td><?= $data['catatan'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>
</div>

<?php require_once 'layout_footer.php' ?>
