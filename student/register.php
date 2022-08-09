<?php
$flag = true;
if (isset($_POST['register'])) {
    //assign variable

    $error_message = "";

    $flag = check_user();    // check if user exist

    if ($flag == 0) { //if user does not exist.
        $error_message = register_user();
    } else $error_message = "User already exist! Please login.";
}
?>
<?php
function check_user()
{
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    require "../db_connect.php";
    $select = "SELECT * from stud_register where email='$email';";
    $result = $conn->query($select);
    if ($result->num_rows > 0) {
        $conn->close();
        return 1;
    } else return 0;
}
function register_user()
{
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    require "../db_connect.php";
    $insert = "INSERT INTO stud_register (`email`,`password`) VALUES ('$email','$user_password');";
    $conn->query($insert);
    $conn->close();
    return "user registered.";
}
?>

<html lang="en">

<head>
    <title>registration</title>
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <form class="container center" method="post">
        <h1 class="center">Register</h1>
        <span class="center"><?php if (isset($error_message)) echo $error_message; ?></span>
        <div class="col">
            <?php if ($flag) { ?>
                <label for="user">Email</label>
                <input class="input" type="email" name="email" id="user" value='<?php if (isset($email)) {
                                                                                    echo $email;
                                                                                } ?>' placeholder="User Name" required>
                <label for="password">Password</label>
                <input class="input" type="password" name="password" id="password" placeholder="Password" required>
                <button type="submit" name="register"> Register</button>
            <?php } ?>
            <div class="center">already have an account? <a href="./index.php" target="_self">login</a>!</div>

        </div>
    </form>
</body>

</html>