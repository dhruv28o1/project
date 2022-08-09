<?php
require_once "../db_connect.php";
if (isset($_POST['submit_search']) && $_POST['search']) {
    $name = $_POST['search'];
    $select = "select id,first_name,last_name,email,number,picture from stud_register,student_info WHERE sno=id AND first_name='$name';";
} else {
    $select = "select id,first_name,last_name,email,number,picture from stud_register,student_info WHERE sno=id;";
}
$result = $conn->query($select);
?>
<?php
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $update = "DELETE FROM stud_register WHERE id='$id';";
    $conn->query($update);
    echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['preview'])) {
    session_start();
    $_SESSION['id'] = $_POST['preview'];
    header('location:../admission/end.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>database view</title>
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

    <!-- _________table start_______ -->

    <form method='post' id="form">
        <table class="container-fluid table table-bordered text-center">

            <thead class="table-dark">
                <tr>
                    <th>sno</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Image</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                    $image = 'data:image/jpg;base64,' . $row['picture'];
                ?>
                <tr>
                    <th><?php echo $count . ".";  ?></th>
                    <th class='text-nowrap'><?php echo $row['first_name'] . " " . $row['last_name']; ?></th>
                    <th><?php echo $row['email']; ?></th>
                    <th><?php echo $row['number']; ?></th>
                    <th><?php echo "<img src='$image' width=60px>"; ?></th>
                    <th>
                        <div>
                            <button name='preview' value=<?php echo $row['id']; ?> class="btn"><img
                                    src="./image/preview.jfif" width='40px' alt="preview"></button>
                        </div>
                        <div>

                            <button name='delete' value=<?php echo $row['id']; ?> class="btn"><img
                                    src="./image/delete.png" width='40px' alt="delete"></button>
                        </div>
                    </th>
                </tr>
                <?php $count += 1;
                } ?>
            </tbody>
        </table>
    </form>

    <!-- ______confirm delete______ -->
    <script>
    btn=document.getElementById("delete");
    btn.addEventListener("submit",(e)=>{
        if(!confirm("do you want to delete the record")){

            e.preventDefault();
        }

    })
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>