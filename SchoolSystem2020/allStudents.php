<?php
   include('session.php');
?>

<html>
<head>
  <title>Home - SS2020</title>
  <?php
    include('head.php');
  ?>
</head>
<body>

<?php include("header.php"); ?>
<div id="resultsContainer">
  <h2 class="text-center">All Students</h2>
  <br />

  <table id="resultsTable" border='1'>
    <tr>
      <th colspan="7">SORT BY</th>
    <tr>
      <th><a href="allStudents.php?sort=name">Name</a></th>
      <th><a href="allStudents.php?sort=surname">Surname</th>
      <th><a href="allStudents.php?sort=id">ID</th>
      <th><a href="allStudents.php?sort=year">Year</th>
      <th><a href="allStudents.php?sort=dob">DOB</th>
      <th><a href="allStudents.php?sort=paid">Paid</th>
      <th><a href="allStudents.php?sort=email">Email</th>
    </tr>
  <?php
    $sortby = $_GET['sort'];
    if($sortby == 'name'){
      $sql = "SELECT * FROM records ORDER BY name ASC;";
      $result = $db->query($sql);
      if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
      }
      while ($row = $result->fetch_assoc()) {
        $ID = $row["ID"];
        $name = $row["name"];
        $surname = $row["surname"];
        $year = $row["year"];
        $dob = $row["dob"];
        $paid = $row["paid"];
        $email = $row["email"];
        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$surname}</td>";
        echo "<td>{$ID}</td>";
        echo "<td>{$year}</td>";
        echo "<td>{$dob}</td>";
        if ($paid == 1){
          echo "<td><img src=\"images/yes1.png\" draggable=\"false\"></img></td>";
        }
        else{
          echo "<td><img src=\"images/no1.png\" draggable=\"false\"></img></td>";
        }
        //displays raw value
        //echo "<td>{$paid}</td>";
        echo "<td>{$email}</td>";
      }
    }
    else if($sortby == 'surname'){
      $sql = "SELECT * FROM records ORDER BY surname ASC;";
      $result = $db->query($sql);
      if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
      }
      while ($row = $result->fetch_assoc()) {
        $ID = $row["ID"];
        $name = $row["name"];
        $surname = $row["surname"];
        $year = $row["year"];
        $dob = $row["dob"];
        $paid = $row["paid"];
        $email = $row["email"];
        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$surname}</td>";
        echo "<td>{$ID}</td>";
        echo "<td>{$year}</td>";
        echo "<td>{$dob}</td>";
        if ($paid == 1){
          echo "<td><img src=\"images/yes1.png\" draggable=\"false\"></img></td>";
        }
        else{
          echo "<td><img src=\"images/no1.png\" draggable=\"false\"></img></td>";
        }
        //displays raw value
        //echo "<td>{$paid}</td>";
        echo "<td>{$email}</td>";
      }
    }
    else if($sortby == 'year'){
      $sql = "SELECT * FROM records ORDER BY year ASC;";
      $result = $db->query($sql);
      if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
      }
      while ($row = $result->fetch_assoc()) {
        $ID = $row["ID"];
        $name = $row["name"];
        $surname = $row["surname"];
        $year = $row["year"];
        $dob = $row["dob"];
        $paid = $row["paid"];
        $email = $row["email"];
        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$surname}</td>";
        echo "<td>{$ID}</td>";
        echo "<td>{$year}</td>";
        echo "<td>{$dob}</td>";
        if ($paid == 1){
          echo "<td><img src=\"images/yes1.png\" draggable=\"false\"></img></td>";
        }
        else{
          echo "<td><img src=\"images/no1.png\" draggable=\"false\"></img></td>";
        }
        //displays raw value
        //echo "<td>{$paid}</td>";
        echo "<td>{$email}</td>";
      }
    }
    else if($sortby == 'dob'){
      $sql = "SELECT * FROM records ORDER BY dob ASC;";
      $result = $db->query($sql);
      if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
      }
      while ($row = $result->fetch_assoc()) {
        $ID = $row["ID"];
        $name = $row["name"];
        $surname = $row["surname"];
        $year = $row["year"];
        $dob = $row["dob"];
        $paid = $row["paid"];
        $email = $row["email"];
        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$surname}</td>";
        echo "<td>{$ID}</td>";
        echo "<td>{$year}</td>";
        echo "<td>{$dob}</td>";
        if ($paid == 1){
          echo "<td><img src=\"images/yes1.png\" draggable=\"false\"></img></td>";
        }
        else{
          echo "<td><img src=\"images/no1.png\" draggable=\"false\"></img></td>";
        }
        //displays raw value
        //echo "<td>{$paid}</td>";
        echo "<td>{$email}</td>";
      }
    }
    else if($sortby == 'paid'){
      $sql = "SELECT * FROM records ORDER BY paid ASC;";
      $result = $db->query($sql);
      if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
      }
      while ($row = $result->fetch_assoc()) {
        $ID = $row["ID"];
        $name = $row["name"];
        $surname = $row["surname"];
        $year = $row["year"];
        $dob = $row["dob"];
        $paid = $row["paid"];
        $email = $row["email"];
        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$surname}</td>";
        echo "<td>{$ID}</td>";
        echo "<td>{$year}</td>";
        echo "<td>{$dob}</td>";
        if ($paid == 1){
          echo "<td><img src=\"images/yes1.png\" draggable=\"false\"></img></td>";
        }
        else{
          echo "<td><img src=\"images/no1.png\" draggable=\"false\"></img></td>";
        }
        //displays raw value
        //echo "<td>{$paid}</td>";
        echo "<td>{$email}</td>";
      }
    }
    else if($sortby == 'email'){
      $sql = "SELECT * FROM records ORDER BY email ASC;";
      $result = $db->query($sql);
      if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
      }
      while ($row = $result->fetch_assoc()) {
        $ID = $row["ID"];
        $name = $row["name"];
        $surname = $row["surname"];
        $year = $row["year"];
        $dob = $row["dob"];
        $paid = $row["paid"];
        $email = $row["email"];
        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$surname}</td>";
        echo "<td>{$ID}</td>";
        echo "<td>{$year}</td>";
        echo "<td>{$dob}</td>";
        if ($paid == 1){
          echo "<td><img src=\"images/yes1.png\" draggable=\"false\"></img></td>";
        }
        else{
          echo "<td><img src=\"images/no1.png\" draggable=\"false\"></img></td>";
        }
        //displays raw value
        //echo "<td>{$paid}</td>";
        echo "<td>{$email}</td>";
      }
    }
    else{
    $sql = "SELECT * FROM records;";
    $result = $db->query($sql);
    if (!$result) {
      trigger_error('Invalid query: ' . $db->error);
    }
    while ($row = $result->fetch_assoc()) {
      $ID = $row["ID"];
      $name = $row["name"];
      $surname = $row["surname"];
      $year = $row["year"];
      $dob = $row["dob"];
      $paid = $row["paid"];
      $email = $row["email"];
      echo "<tr>";
      echo "<td>{$name}</td>";
      echo "<td>{$surname}</td>";
      echo "<td>{$ID}</td>";
      echo "<td>{$year}</td>";
      echo "<td>{$dob}</td>";
      if ($paid == 1){
        echo "<td><img src=\"images/yes1.png\" draggable=\"false\"></img></td>";
      }
      else{
        echo "<td><img src=\"images/no1.png\" draggable=\"false\"></img></td>";
      }
      //displays raw value
      //echo "<td>{$paid}</td>";
      echo "<td>{$email}</td>";
    }
  }
  ?>
</div>
<?php include("footer.php"); ?>

</body>
</html>
