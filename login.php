<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/app/style.css">
    <link rel="stylesheet" href="assets/themes/flatly/bootstrap.min.css">

    <title>Arsip</title>

</head>

<body>

    <main role="main" class="container">

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <?php if (isset($_GET['error_message'])) : ?>
                    <div class="alert alert-danger">
                        <?= $_GET['error_message'] ?>
                    </div>
                <?php endif ?>
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <div class="card-title">
                            <h3>Login</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="" action="user_act_login.php" method="post">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" value="" class="form-control" required>
                            </div>

                            <p>
                                <button type="submit" name="button" class="btn btn-info btn-block">Login</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- /.container -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>