<?php
   include('session.php');
   $id=$_GET['id'];
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     $name = mysqli_real_escape_string($db,$_POST['name']);
     $surname = mysqli_real_escape_string($db,$_POST['surname']);
     $dob = mysqli_real_escape_string($db,$_POST['dob']);
     $year = mysqli_real_escape_string($db,$_POST['year']);
     $paid = isset($_POST['paid'][0]) ? 1 : 0;
     $email = mysqli_real_escape_string($db,$_POST['email']);
     $sql = "UPDATE records SET name='{$name}', surname='{$surname}', dob='{$dob}', paid={$paid}, email='{$email}', `year`={$year} WHERE ID={$id};";
     $result = $db->query($sql);
     if (!$result) {
       trigger_error('Invalid query: ' . $db->error);
     }
     else{
       $user = $_SESSION['login_user'];
       $sql = "INSERT INTO log (`action`, `time`, who, stud_id, fname) VALUES('EDIT', CURRENT_TIMESTAMP, '{$user}', {$id}, '{$name}');";
       $result = $db->query($sql);
       if (!$result) {
         trigger_error('Invalid query: ' . $db->error);
       }
       header("location: updateSuccess.php");
     }
   }
?>

<html>
<head>
  <title>Editing Record - SS2020</title>
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
  echo "<div id=\"addRecord\">", PHP_EOL;
  echo "<h2 class=\"text-center\">Editing record with ID {$id}</h2><hr /><br />", PHP_EOL;
  echo "<form action = \"\" method = \"post\">", PHP_EOL;
  echo "<label>Name: </label>", PHP_EOL;
  echo "<input type=\"text\" name=\"name\" pattern=\"[a-zA-Z]*\" value=\"{$name}\" required></input><br /><br />", PHP_EOL;
  echo "<label>Surname: </label>", PHP_EOL;
  echo "<input type=\"text\" name=\"surname\" pattern=\"[a-zA-Z]*\" required value=\"{$surname}\"></input><br /><br />", PHP_EOL;
  echo "<label>Date of Birth: </label>", PHP_EOL;
  echo "<input type=\"date\" name=\"dob\" required value=\"{$dob}\"></input><br /><br />", PHP_EOL;
  echo "<label>Academic Year: </label>", PHP_EOL;
  if($year == 1){
    echo "<input type=\"radio\" name=\"year\" value=\"1\" required checked>1</input>", PHP_EOL;
    echo "<input type=\"radio\" name=\"year\" value=\"2\">2</input>", PHP_EOL;
    echo "<input type=\"radio\" name=\"year\" value=\"3\">3</input><br /><br />", PHP_EOL;
  }
  else if($year == 2){
    echo "<input type=\"radio\" name=\"year\" value=\"1\" required>1</input>", PHP_EOL;
    echo "<input type=\"radio\" name=\"year\" value=\"2\" checked>2</input>", PHP_EOL;
    echo "<input type=\"radio\" name=\"year\" value=\"3\">3</input><br /><br />", PHP_EOL;
  }
  else {
    echo "<input type=\"radio\" name=\"year\" value=\"1\" required>1</input>", PHP_EOL;
    echo "<input type=\"radio\" name=\"year\" value=\"2\">2</input>", PHP_EOL;
    echo "<input type=\"radio\" name=\"year\" value=\"3\" checked>3</input><br /><br />", PHP_EOL;

  }
  echo "<label>Paid? </label>", PHP_EOL;
  if($paid == 1){
    echo "<input type=\"checkbox\" name=\"paid\" checked><br /><br />", PHP_EOL;
  }
  else{
    echo "<input type=\"checkbox\" name=\"paid\"><br /><br />", PHP_EOL;
  }
  echo "<label>Email: </label>";
  echo "<input type=\"email\" name=\"email\" value=\"{$email}\" required></input><br /><br />", PHP_EOL;
  echo "<input id=\"submitRecord\" type = \"submit\" value = \"Submit!\"/>", PHP_EOL;
  echo "</div>";
?>
<?php include("footer.php"); ?>

</body>
</html>
