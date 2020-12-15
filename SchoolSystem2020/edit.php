<?php
   include('session.php');
   global $error;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     $id = mysqli_real_escape_string($db,$_POST['id']);
     $sql = "SELECT ID FROM records WHERE ID = '$id';";
     $result = $db->query($sql);
     if (!$result) {
       trigger_error('Invalid query: ' . $db->error);
     }
     $row = $result->fetch_assoc();
     $count = $result->num_rows;
     if($count == 1) {
       header("Location: recordEditor.php?id=$id");
     }
     else{
       $error = "The ID entered does not exist in the database";
     }
     if($id == ''){
       $error = "Please enter an ID";
     }
   }
?>

<html>
<head>
  <title>Edit Record - SS2020</title>
  <?php
    include('head.php');
  ?>
</head>
<body>
<?php include("header.php"); ?>

<div id="editRecord">
  <h2 class="text-center">Edit Record</h2>

  <h2>This feature lets you edit any record found in the system.<br />Just enter the student's ID, and you'll get to edit the student's details and save the new data to the system.</h2>
  <hr /><br />
  <form action = "" method = "post">
    <label class="editSearchHint">Search by ID:</label>
    <input type="number" name="id"></input><br /><br />
    <input id="submitRecord" type = "submit" value = "Search"/>
    <p class="errorMsg"><?php echo $error; ?></p>
  </form>
<?php include("footer.php"); ?>
</body>
</html>
