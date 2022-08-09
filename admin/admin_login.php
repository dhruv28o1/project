<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid ">
        <a class="navbar-brand" href="#">
      <img src="../logo.jfif" style="border-radius: 20px;" alt="" width="40" height="40">
    </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../student/index.php">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="post">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search">
                    <button class="btn btn-outline-success text-white" type="submit"
                        name="submit_search">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Admin login form</h1>
                <p class="col-lg-10 fs-4">Admin can login with Admin_id and password to access student database and
                    preview and
                    modify it.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">

                <p class="d-flex justify-content-center text-danger">
                    <?php if (isset($_SESSION['error'])) echo $_SESSION["error"]; ?></p>
                <!-- ___________________form start_______________ -->
                <form class="p-4 p-md-5 border rounded-3 bg-light" action="admin.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="admin_email"
                            placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password"
                            placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me" name="rembember"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
                    <hr class="my-4">
                    <small class="text-muted">click Remember me, 60sec login cookie.</small>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
session_destroy();
?>