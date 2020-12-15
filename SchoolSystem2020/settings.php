<?php
  include('session.php');
  global $error;
  global $authError;
  $time = time();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST['submit']) {
      case 'Update':
        $oldpassword = mysqli_real_escape_string($db,$_POST['oldpassword']);
        $newpassword = mysqli_real_escape_string($db,$_POST['newpassword']);
        $confirmpassword = mysqli_real_escape_string($db,$_POST['confirmpassword']);
        $username = $_SESSION['login_user'];
        $sql2 = "UPDATE login SET unixcreationtime = '$time', password = SHA2(CONCAT('$time','$newpassword'),512) WHERE user = '$username'";
        $sql = "SELECT user FROM login WHERE user = '$username' and password = SHA2(CONCAT(unixcreationtime,'$oldpassword'),512)";
        $result = $db->query($sql);
        if (!$result) {
          trigger_error('Invalid query: ' . $db->error);
        }
        $row = $result->fetch_assoc();
        $count = $result->num_rows;
        if($count == 1) {
          if($newpassword == $confirmpassword){
            $update = $db->query($sql2);
            header("location: login.php");
          }
          else{
            $error = "The passwords you entered in the new fields do not match.";
          }
        }
        else {
          $error = "Your Old Password is invalid";
        }
        break;
      case 'Enter':
        $password = mysqli_real_escape_string($db,$_POST['password']);
        $sql = "SELECT user FROM login WHERE user = 'admin' and password = SHA2(CONCAT(unixcreationtime,'$password'),512)";
        $result = $db->query($sql);
        if (!$result) {
          trigger_error('Invalid query: ' . $db->error);
        }
        $row = $result->fetch_assoc();
        $count = $result->num_rows;
        if($count == 1) {
          $_SESSION['login_user'] = 'admin';
          header("location: admin.php");
        }
        else{
          $authError = "You entered an incorrect password.";
        }
        break;
      }
    }
?>
<html>
<head>
  <title>Account Settings - SS2020</title>
  <?php
    include('head.php');
  ?>
</head>
<body>
<?php include("header.php"); ?>
<h2 class="text-center">Account Settings</h2>
  <div id="container-content">
    <div id="login-frame">
      <div id="spacing">
        <form action="" method="post">
          <label>Old Password:&emsp; </label><input type="password" name="oldpassword" class="box" /><br/><br />
          <label>New Password:&emsp; </label><input type="password" name="newpassword" class="box" /><br/><br />
          <label>Confirm Password:&emsp; </label><input type="password" name="confirmpassword" class="box" /><br/><br />
          <input type = "submit" name = "submit" value = "Update"/><br />
        </form>
        <div class="errorMsg">
          <?php echo $error; ?>
        </div>
      </div>
    </div>
    <br /> <br />
    <form action="" method="post">
      <h3>Admin Area</h3>
      <label>Password:&emsp; </label><input type="password" name="password" class="box" /><br/><br />
      <input type = "submit" name = "submit"  value = "Enter"/><br />
    </form>
    <div class="errorMsg">
      <?php echo $authError; ?>
    </div>
  </div>

<?php include("footer.php"); ?>

</body>
</html>
