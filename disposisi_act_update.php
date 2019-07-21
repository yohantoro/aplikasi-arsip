<?php

include 'config/connection.php';

if (isset($_POST)) {

    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $surat_id = isset($_POST['surat_id']) ? $_POST['surat_id'] : 0;
    $tujuan = isset($_POST['tujuan']) ? $_POST['tujuan'] : '';
    $isi_disposisi = isset($_POST['isi_disposisi']) ? $_POST['isi_disposisi'] : '';
    $sifat = isset($_POST['sifat']) ? $_POST['sifat'] : '';
    $batas_waktu = isset($_POST['batas_waktu']) ? $_POST['batas_waktu'] : '';
    $catatan = isset($_POST['catatan']) ? $_POST['catatan'] : '';

    $query = "UPDATE disposisi
    SET
        surat_id = $surat_id,
        tujuan = '$tujuan',
        isi_disposisi = '$isi_disposisi',
        sifat = '$sifat',
        batas_waktu = '$batas_waktu',
        catatan = '$catatan'
    WHERE id = " . $id;

    // apakah query berhasil dijalankan?
    if (mysqli_query($con, $query)) {
        // tampilkan hasil
        header('location:disposisi_detail.php?id=' . $id);
    } else {
        // hentikan program dan tampilkan error
        die('Ada Error: ' . mysqli_error($con));
    }

}

return false;

?>
