<?php
  ob_start();
  include("db.php");
  session_start();
  global $error;
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    $time = time();
    echo $time;
    $sql = "SELECT user FROM login WHERE user = '$myusername' and password = SHA2(CONCAT(unixcreationtime,'$mypassword'),512)";
    $result = $db->query($sql);
    if (!$result) {
      trigger_error('Invalid query: ' . $db->error);
    }
    $row = $result->fetch_assoc();
    $count = $result->num_rows;
    if($count == 1) {
      $_SESSION['login_user'] = $myusername;
      if($_SESSION['login_user'] == 'admin'){
        header("location: admin.php");
      }
      else{
        header("location: home.php");
      }
    }else {
      $error = "Your Login Name or Password is invalid";
    }
  }
?>
<html>

<head>
  <?php
    include('head.php');
  ?>
</head>

<body>
  <div id="container">
    <div id="container-content">
      <div id="login-frame">
        <div id="title-bar"><b>School System 2020 - Login</b></div>
          <div id="spacing">
            <img id="loginImg" src="images/loginIcon.png"></img>
            <form action="" method="post">
              <label>Username:&emsp;</label><input type="text" name="username" class="box"/><br /><br />
              <label>Password:&emsp; </label><input type="password" name="password" class="box" /><br/><br />
              <input type = "submit" value = " Log In "/><br />
            </form>
            <div class="errorMsg">
              <?php echo $error; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
