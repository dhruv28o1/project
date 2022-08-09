<?php
session_start();
?>
<?php
$flag = _login();
_view($flag);
$conn->close();
?>

<?php
function set_cookie($admin_id)
{
   setcookie('id', $admin_id, time() + (60), "./admin"); //set cookie for 1 day
}
function _view($flag)
{
   if ($flag || isset($_COOKIE['id'])) {
      header("location:./view.php");

      return;
   }
   header("location:./admin_login.php");
}

function _login()
{
   if (isset($_POST["submit"])) {

      $admin_id = $_POST["admin_email"];
      $admin_ps = $_POST["password"];

      include_once "../db_connect.php";
      $select = "SELECT * From `admin` WHERE `user_name`='$admin_id'";
      $result = $conn->query($select);

      if (($row = $result->fetch_assoc()) && ($row['password'] == $admin_ps)) {
         if (isset($_POST['rembember'])) {
            set_cookie($admin_id);
         }
         return 1;
      }
      $_SESSION['error'] = "username or password not match";
   }
   return 0;
}

?>