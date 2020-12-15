<?php
   include('session.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     $name = mysqli_real_escape_string($db,$_POST['name']);
     $surname = mysqli_real_escape_string($db,$_POST['surname']);
     $dob = mysqli_real_escape_string($db,$_POST['dob']);
     $year = mysqli_real_escape_string($db,$_POST['year']);
     $paid = isset($_POST['paid'][0]) ? 1 : 0;
     $email = mysqli_real_escape_string($db,$_POST['email']);
     $sql = "INSERT INTO records (name, surname, dob, paid, email, `year`) VALUES('{$name}', '{$surname}', '{$dob}', {$paid}, '{$email}', {$year});";
     $result = $db->query($sql);
     if (!$result) {
       trigger_error('Invalid query: ' . $db->error);
     }
     else{
       $user = $_SESSION['login_user'];
       $sql = "INSERT INTO log (`action`, `time`, who, stud_id, fname) VALUES('CREATE', CURRENT_TIMESTAMP, '{$user}', (SELECT ID FROM records ORDER BY ID DESC LIMIT 1), '{$name}');";
       $result = $db->query($sql);
       if (!$result) {
         trigger_error('Invalid query: ' . $db->error);
       }
       header("location: success.php");
     }
   }
?>

<html>
<head>
  <title>Add a Record - SS2020</title>
  <?php
    include('head.php');
  ?>
</head>
<body>
<?php include("header.php"); ?>
<h2 class="text-center">Add a New Record</h2>
<div id="addRecord">
  <form action = "" method = "post">
    <label>Name:</label>
    <input type="text" name="name" pattern="[a-zA-Z]*" required></input><br /><br />
    <label>Surname:</label>
    <input type="text" name="surname" pattern="[a-zA-Z]*" required></input><br /><br />
    <label>Date of Birth:</label>
    <input type="date" name="dob" required></input><br /><br />
    <label>Academic Year:</label>
    <input type="radio" name="year" value="1" required>1</input>
    <input type="radio" name="year" value="2">2</input>
    <input type="radio" name="year" value="3">3</input><br /><br />
    <label>Paid?</label>
    <input type="checkbox" name="paid"><br /><br />
    <label>Email:</label>
    <input type="email" name="email" required></input><br /><br />
    <input id="submitRecord" type = "submit" value = "Add!"/>
</div>
<?php include("footer.php"); ?>
</body>
</html>
