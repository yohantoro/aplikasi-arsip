<?php

include 'config/connection.php';

if (isset($_POST)) {

    $id             = isset($_POST['id']) ? $_POST['id'] : 0;
    $no_agenda      = isset($_POST['no_agenda']) ? $_POST['no_agenda'] : '';
    $no_surat       = isset($_POST['no_surat']) ? $_POST['no_surat'] : '';
    $pengirim       = isset($_POST['pengirim']) ? $_POST['pengirim'] : '';
    $tgl_kirim      = isset($_POST['tgl_kirim']) ? $_POST['tgl_kirim'] : '';
    $penerima       = isset($_POST['penerima']) ? $_POST['penerima'] : '';
    $tgl_terima     = isset($_POST['tgl_terima']) ? $_POST['tgl_terima'] : '';
    $perihal        = isset($_POST['perihal']) ? $_POST['perihal'] : '';
    $jenis_surat_id = isset($_POST['jenis_surat_id']) ? $_POST['jenis_surat_id'] : 0;

    $query = "UPDATE surat_masuk
    SET
        no_agenda = $no_agenda,
        no_surat = '$no_surat',
        pengirim = '$pengirim',
        tgl_kirim = '$tgl_kirim',
        penerima = '$penerima',
        tgl_terima = '$tgl_terima',
        perihal = '$perihal',
        jenis_surat_id = $jenis_surat_id
    WHERE id = " . $id;

    // apakah query berhasil dijalankan?
    if (mysqli_query($con, $query)) {
        // tampilkan hasil
        header('location:smasuk_detail.php?id=' . $id);
    } else {
        // hentikan program dan tampilkan error
        die('Ada Error: ' . mysqli_error($con));
    }

}

return false;

?>
