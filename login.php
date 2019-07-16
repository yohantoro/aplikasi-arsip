<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/app/style.css">

    <title>Arsip</title>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Arsip</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container">

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <?php if (isset($_GET['error_message'])): ?>
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

        <script src="assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
