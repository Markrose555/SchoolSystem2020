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
       header("Location: removeConfirm.php?id=$id");
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
  <title>Remove Record - SS2020</title>
  <?php
    include('head.php');
  ?>
</head>
<body>
<?php include("header.php"); ?>

<div id="removeRecord">
  <h2 class="text-center">Remove Record</h2>

  <h3>This feature lets you remove any record from the system.<br />Just enter the student's ID, and you'll get to confirm the student's details before deleting the record.</h3>
  <hr /><br />
  <form action = "" method = "post">
    <label class="removeSearchHint">Search by ID:&emsp;</label>
    <input type="number" name="id"></input><br /><br />
    <input id="submitRecord" type = "submit" value = "Search"/>
    <p class="errorMsg"><?php echo $error; ?></p>
<?php include("footer.php"); ?>
</body>
</html>
