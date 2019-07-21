<?php

require 'layout_header.php';

$smasukCountQuery = "SELECT id FROM surat_masuk";
$smasukCountResult = mysqli_query($con, $smasukCountQuery);
$smasukTotal = mysqli_num_rows($smasukCountResult);

$skeluarCountQuery = "SELECT id FROM surat_keluar";
$skeluarCountResult = mysqli_query($con, $skeluarCountQuery);
$skeluarTotal = mysqli_num_rows($skeluarCountResult);

$disposisiCountQuery = "SELECT id FROM disposisi";
$disposisiCountResult = mysqli_query($con, $disposisiCountQuery);
$disposisiTotal = mysqli_num_rows($disposisiCountResult);


?>

<div class="starter-template">

    <div class="row">
        <div class="col-lg-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h1><?= $smasukTotal ?></h1>
                    Surat Masuk
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h1><?= $skeluarTotal ?></h1>
                    Surat Keluar
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h1><?= $disposisiTotal ?></h1>
                    Disposisi
                </div>
            </div>
        </div>
    </div>

</div>

<?php require 'layout_footer.php'; ?>
