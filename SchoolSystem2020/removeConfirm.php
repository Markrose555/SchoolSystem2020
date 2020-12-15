<?php
   include('session.php');
   $id=$_GET['id'];
   global $error;

   $sql = "SELECT * FROM records WHERE ID = {$id};";
   $result = $db->query($sql);
   if (!$result) {
     trigger_error('Invalid query: ' . $db->error);
   }
   $row = $result->fetch_assoc();
   $name = $row["name"];

   if($_SERVER["REQUEST_METHOD"] == "POST") {
     $paid = isset($_POST['confirm'][0]) ? 1 : 0;
     if($paid == 0){
       $error = "Please check the box above to confirm your action.";
     }
     else{
       $sql = "DELETE FROM records WHERE ID={$id};";
       $result = $db->query($sql);
       if (!$result) {
         trigger_error('Invalid query: ' . $db->error);
       }
       else{
         $user = $_SESSION['login_user'];
         $sql = "INSERT INTO log (`action`, `time`, who, stud_id, fname) VALUES('REMOVE', CURRENT_TIMESTAMP, '{$user}', {$id}, '{$name}');";
         $result = $db->query($sql);
         if (!$result) {
           trigger_error('Invalid query: ' . $db->error);
         }
         header("location: removeSuccess.php");
       }
     }
   }
?>
<html>
<head>
  <title>Remove Confirmation - SS2020</title>
  <?php
    include('head.php');
  ?>
</head>
<body>
<?php include("header.php"); ?>
<?php
$id=$_GET['id'];
$sql = "SELECT * FROM records WHERE ID = {$id};";
$result = $db->query($sql);
if (!$result) {
  trigger_error('Invalid query: ' . $db->error);
}
$row = $result->fetch_assoc();
$name = $row["name"];
$surname = $row["surname"];
$year = $row["year"];
$dob = $row["dob"];
$paid = $row["paid"];
$email = $row["email"];
echo "<div id=\"recordDetailsContainer\">", PHP_EOL;
  echo "<form action = \"\" method = \"post\">", PHP_EOL;
    echo "<h2>Are you sure you want to remove this record?</h2>", PHP_EOL;
    echo "<hr />", PHP_EOL;
    echo "<h3>Name: {$name}</h3>", PHP_EOL;
    echo "<h3>Surname: {$surname}</h3>", PHP_EOL;
    echo "<h3>ID: {$id}</h3>", PHP_EOL;
    echo "<h3>Year: {$year}</h3>", PHP_EOL;
    echo "<h3>Email: {$email}</h3>", PHP_EOL;
    echo "<hr />", PHP_EOL;
    echo "<h2>This cannot be undone.</h2>", PHP_EOL;
    echo "<label>Yes, I want to delete<br />this record forever</label>", PHP_EOL;
    echo "<input type=\"checkbox\" name=\"confirm\"><br /><br />", PHP_EOL;
    echo "<p class=\"errorMsg\">{$error}</p>", PHP_EOL;
    echo "<input id=\"removeRecordButton\" type = \"submit\" value = \"Delete\"/>", PHP_EOL;
  echo "</form>", PHP_EOL;
echo "</div>", PHP_EOL;
?>
<?php include("footer.php"); ?>
</body>
</html>
