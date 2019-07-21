<?php

include 'layout_header.php';

// $id             = isset($_GET['id']) ? $_GET['id'] : 0;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = 'smasuk_act_update.php';
    $judul = 'Buat Surat Masuk Baru';
} else {
    $id = 0;
    $action = 'smasuk_act_create.php';
    $judul = 'Ubah Data Surat Masuk';
}

$no_agenda      = '';
$no_surat       = '';
$pengirim       = '';
$tgl_kirim      = '';
$penerima       = '';
$tgl_terima     = '';
$perihal        = '';
$jenis_surat_id = 0;

$query = "SELECT * FROM surat_masuk WHERE id = " . $id;
$result = mysqli_query($con, $query);

if (!$result) { // jika query gagal
    die(mysqli_error($con)); // Aplikasi berhenti dan menampilkan error
}
/* Jika query berhasil dan datanya tidak kosong */
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        $no_agenda      = $data['no_agenda'];
        $no_surat       = $data['no_surat'];
        $pengirim       = $data['pengirim'];
        $tgl_kirim      = $data['tgl_kirim'];
        $penerima       = $data['penerima'];
        $tgl_terima     = $data['tgl_terima'];
        $perihal        = $data['perihal'];
        $jenis_surat_id = $data['jenis_surat_id'];
    }
}

?>

<h1><?= $judul ?></h1>

<p>
    <a href="smasuk_list.php" class="btn btn-secondary">Kembali ke Daftar Surat Masuk</a>
</p>

<form class="" action="<?= $action ?>" method="post">
    <div class="card">
        <div class="card-body">

            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="no-agenda">No. Agenda</label>
                        <input type="text" name="no_agenda" class="form-control" id="no-agenda" value="<?= $no_agenda ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="no-surat">No. Surat</label>
                        <input type="text" name="no_surat" class="form-control" id="no-surat" value="<?= $no_surat ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" name="pengirim" class="form-control" id="pengirim" value="<?= $pengirim ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl-kirim">Tgl. Kirim</label>
                        <input type="text" name="tgl_kirim" class="form-control" id="tgl-kirim" value="<?= $tgl_kirim ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input type="text" name="penerima" class="form-control" id="penerima" value="<?= $penerima ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl-terima">Tgl. Terima</label>
                        <input type="text" name="tgl_terima" class="form-control" id="tgl-terima" value="<?= $tgl_terima ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" name="perihal" class="form-control" id="perihal" value="<?= $perihal ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="jenis-surat-id">Jenis Surat</label>
                        <input type="text" name="jenis_surat_id" class="form-control" id="jenis-surat-id" value="<?= $jenis_surat_id ?>">
                    </div>
                </div>
            </div>

            <button type="submit" name="button" class="btn btn-success">Simpan</button>

        </div>
    </div>
</form>

<?php include 'layout_footer.php'; ?>
