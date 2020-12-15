<?php
   include('session.php');
?>

<html>
<head>
  <title>Unpaid Tuitions - SS2020</title>
  <?php
    include('head.php');
  ?>
</head>
<body>

<?php include("header.php"); ?>

<!--<h2 class="text-center">Unpaid Tuitions</h2>
<?php
  echo "<ul>\n";
  $sql = "SELECT name, surname, dob, ID, paid, email, `year` FROM schoolSystem.records WHERE paid = false;";
  $result = $db->query($sql);
  while ($row = $result->fetch_assoc()) {
    $ID = $row["ID"];
    $name = $row["name"];
    $surname = $row["surname"];
    $year = $row["year"];
    echo "<li>{$name} {$surname} - ID: {$ID}</li>";
  }
?>-->

<br /><br />
<div id="tableView">
  <h2 class="text-center">Unpaid Tuitions</h2>


  <div id="tableViewContents">
    <p style="float: left;">Name</p>
    <p style="float: right;">ID</p><br/><br/><br/>
    <?php
      echo "<ul id=\"tableViewResults\">\n";
      $sql = "SELECT name, surname, dob, ID, paid, email, `year` FROM schoolSystem.records WHERE paid = false;";
      $result = $db->query($sql);
      if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
      }
      while ($row = $result->fetch_assoc()) {
        $ID = $row["ID"];
        $name = $row["name"];
        $surname = $row["surname"];
        $year = $row["year"];
        //echo "<li>{$name} {$surname} - ID: {$ID}</li>";
        echo "<hr /><p style=\"display: inline-block;\" >{$name}&nbsp;&nbsp;{$surname}</p>";
        echo "<p style=\"display: inline-block; float: right;\">{$ID}</p>";
      }
    ?>
    </ul>
  </div>
</div>


<?php include("footer.php"); ?>

</body>
</html>
