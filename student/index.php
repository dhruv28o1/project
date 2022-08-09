<?php
session_start();
?>
<?php
if (isset($_POST['login'])) {
    //assign variable

    $error_message = "";


    $flag = check_user(); // check if user exist
    if ($flag == 0) {
        $error_message = "user does not exist!please register.";
    }
    // if user exist.   
    else $error_message = _login();
}
?>
<?php
function check_user()
{
    require "../db_connect.php";
    $email = $_POST['email'];
    $user_passowrd = $_POST['password'];
    $select = "SELECT * from stud_register where email='$email';";
    $result = $conn->query($select);
    if ($result->num_rows > 0) {
        $conn->close();
        return 1;
    } else return 0;
}

function _login()
{
    //if user does not exist.
    require "../db_connect.php";
    $email = $_POST['email'];
    $user_passowrd = $_POST['password'];
    $select = "SELECT * from stud_register where email='$email';";
    $result = $conn->query($select);
    if ($row = $result->fetch_assoc()) {

        if ($row['password'] <> $user_passowrd) {
            return "wrong password";
        }
        $_SESSION['id'] = $row['id'];
        if ($row['status'] == 0)
            header("location:../admission/db_info.php");
        else
            header("location:../admission/end.php");
    }
    $conn->close();
    return "";
}
?>

<html lang="en">

<head>
    <title>login</title>
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <form class="container center" method="post">
        <h1 class="center">LOGIN</h1>
        <span><?php if (isset($error_message)) echo $error_message; ?></span>
        <div class="col">
            <label for="user">Email</label>
            <input class="input" type="email" name="email" id="user" placeholder="User Name" value='<?php if (isset($email)) {
                                                                                                        echo $email;
                                                                                                    } ?>' required>
            <label for="password">Password</label>
            <input class="input" type="password" name="password" id="password" placeholder="Password" required>

            <!-- submit -->
            <button type="submit" name="login"> login</button>


            <div class="bottom">New user? <a href="./register.php" target="_self">register?</a><a class="right" href="">forget?</a></div>
        </div>

    </form>
</body>

</html>