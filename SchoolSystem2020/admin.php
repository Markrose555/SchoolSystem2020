<?php
  include('session-admin.php');
  global $statusUpdate;
  global $statusAdd;
  global $statusRemove;
  $time = time();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST['submit']) {
      case 'Update':
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $newpassword = mysqli_real_escape_string($db,$_POST['newpassword']);
        $confirmpassword = mysqli_real_escape_string($db,$_POST['confirmpassword']);
        $sql2 = "UPDATE login SET unixcreationtime = '$time', password = SHA2(CONCAT('$time','$newpassword'),512) WHERE user = '$username'";
        if($newpassword == $confirmpassword){
          $update = $db->query($sql2);
          $statusUpdate = "Password Changed!";
        }
        else{
          $statusUpdate = "The passwords you entered in the new fields do not match.";
        }
        break;
      case "Add":
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $newpassword = mysqli_real_escape_string($db,$_POST['newpassword']);
        $confirmpassword = mysqli_real_escape_string($db,$_POST['confirmpassword']);
        $sql2 = "INSERT INTO login (`user`, unixcreationtime, password) VALUES('$username', '$time', SHA2(CONCAT('$time','$newpassword'),512));";
        if($newpassword == $confirmpassword){
          $sql = "SELECT user FROM login WHERE user = '$username'";
          $result = $db->query($sql);
          if (!$result) {
            trigger_error('Invalid query: ' . $db->error);
          }
          $row = $result->fetch_assoc();
          $count = $result->num_rows;
          if($count == 1) {
            $statusAdd = "A user with this username already exists.";
            break;
          }
          $update = $db->query($sql2);
          $statusAdd = "User Created!";
        }
        else{
          $statusAdd = "The passwords you entered in the new fields do not match.";
        }
        break;
      case "Remove":
        $paid = isset($_POST['confirm'][0]) ? 1 : 0;
        if($paid == 0){
          $statusRemove = "Please check the box above to confirm your action.";
          break;
        }
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $sql2 = "DELETE FROM login WHERE user = '$username'";
        $sql = "SELECT user FROM login WHERE user = '$username'";
        $result = $db->query($sql);
        if (!$result) {
          trigger_error('Invalid query: ' . $db->error);
        }
        $row = $result->fetch_assoc();
        $count = $result->num_rows;
        if($count == 1) {
          if($row['user'] == "admin"){
            $statusRemove = "You may not delete the admin user account.";
            break;
          }
          $update = $db->query($sql2);
          $statusRemove = "User Deleted!";
        }
        else{
          $statusRemove = "The user you entered does not exist in the database.";
        }
        break;
      case "Visit Homepage":
        header("location: home.php");
        break;
      case "Logout":
        header("location: logout.php");
        break;
    }
  }
 ?>
<html>
<head>
  <title>Admin Panel - SS2020</title>
  <?php
     include('head.php');
  ?>
</head>
<body id="admin">
  <ul class="topbar">
    <li class="topbar-title"><h2>Admin Area</h2></li>
  </ul>
    <div id="panelContainer">
      <div id="panelItem-log">
        <h2 class="text-center">Activity Log</h2>
        <div id="tableViewContents">

          <?php
            echo "<table id=\"logViewResults\">\n", PHP_EOL;
            echo "<thead>", PHP_EOL;
            echo "<tr>", PHP_EOL;
            echo "<th><div>Time</div></th>", PHP_EOL;
            echo "<th><div>Entry</div></th>", PHP_EOL;
            echo "</tr>", PHP_EOL;
            echo "<tbody>", PHP_EOL;
            //$sql = "SELECT * FROM schoolSystem.log s JOIN schoolSystem.records f on s.stud_id = f.ID ORDER BY s.ID DESC LIMIT 50;";
            $sql = "SELECT * FROM schoolSystem.log ORDER BY ID DESC LIMIT 50;";
            $result = $db->query($sql);
            if (!$result) {
              trigger_error('Invalid query: ' . $db->error);
            }
            while ($row = $result->fetch_assoc()) {
              $time = $row["time"];
              $who = $row["who"];
              $action = $row["action"];
              $fname = $row["fname"];
              $id = $row["stud_id"];
              //echo "<li>{$name} {$surname} - ID: {$ID}</li>";
              echo "<tr>", PHP_EOL;
              echo "<td>{$time}</td>", PHP_EOL;
              echo "<td>{$who} executed {$action} on {$fname} ({$id})</td>", PHP_EOL;
              echo "</tr>", PHP_EOL;

            }

          ?>
        </table>
        </div>
      </div>
      <div class="panelItem">
        <h2 class="text-center">Password Change</h2>
        <div id="tableViewContents">
          <form action="" method="post">
            <label>Username:</label><input type="text" name="username" class="box" required/><br/><br />
            <label>New Password:</label><input type="password" name="newpassword" class="box" /><br/><br />
            <label>Confirm:</label><input type="password" name="confirmpassword" class="box" /><br/><br />
            <input type="submit" name="submit" value="Update"/><br />
          </form>
          <div class="errorMsg">
            <?php echo $statusUpdate; ?>
          </div>

        </div>
      </div>
      <div class="panelItem">
        <h2 class="text-center">Add User</h2>
        <div id="tableViewContents">
          <form action="" method="post">
            <label>Username:&emsp; </label><input type="text" name="username" class="box" required/><br/><br />
            <label>Password:&emsp; </label><input type="password" name="newpassword" class="box" /><br/><br />
            <label>Confirm:&emsp; </label><input type="password" name="confirmpassword" class="box" /><br/><br />
            <input type="submit" name="submit" value="Add"/><br />
          </form>
          <div class="errorMsg">
            <?php echo $statusAdd; ?>
          </div>

        </div>
      </div>
      <div class="panelItem">
        <h2 class="text-center">Remove User</h2>
        <div id="tableViewContents">
          <form action="" method="post">
            <label>Username:&emsp; </label><input type="text" name="username" class="box" required/><br/><br />
            <label>Yes, I want to delete this account forever</label>
            <input type="checkbox" name="confirm"><br /><br />
            <input type="submit" name="submit" value="Remove"/><br />
          </form>
          <div class="errorMsg">
            <?php echo $statusRemove; ?>
          </div>

        </div>
      </div>
      <div class="panelItem">
        <h2 class="text-center">Users List</h2>
        <div id="tableViewContents">
          <?php
            echo "<table id=\"userViewResults\">\n", PHP_EOL;
            echo "<thead>", PHP_EOL;
            echo "<tr>", PHP_EOL;
            echo "<th>Name</th>", PHP_EOL;
            echo "</tr>", PHP_EOL;
            echo "<tbody>", PHP_EOL;
            $sql = "SELECT user FROM schoolSystem.login;";
            $result = $db->query($sql);
            if (!$result) {
              trigger_error('Invalid query: ' . $db->error);
            }
            while ($row = $result->fetch_assoc()) {
              $name = $row["user"];
              echo "<tr>", PHP_EOL;
              echo "<td>{$name}</td>", PHP_EOL;
              echo "</tr>", PHP_EOL;
            }
          ?>
        </table>
        </div>
      </div>
    </div>
  <br /><br />
  <form style="text-align:center; margin-bottom: 50px;"action="" method="post">
    <input type="submit" name="submit" value="Visit Homepage"/>
    <input type="submit" name="submit" value="Logout"/><br />
  </form>
  <?php include("footer.php"); ?>

</body>
</html>
