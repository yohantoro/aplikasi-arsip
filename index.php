<?php require 'layout_header.php'; ?>

<div class="starter-template">

    <div class="row">
        <div class="col-lg-12">
            <p class="text-right">
                <small><em>Anda login sebagai <?= $_SESSION['user']['name'] ?></em></small>
            </p>
        </div>
    </div>

</div>

<?php require 'layout_footer.php'; ?>
