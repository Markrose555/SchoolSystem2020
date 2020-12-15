<?php
   include('session.php');
?>

<html>
<head>
  <title>Home - SS2020</title>
  <?php
    include('head.php');
  ?>
<script>
  function viewAll(){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementById("viewall").innerHTML=xmlhttp.responseText;
      }
    }
    $.ajax({
      url:"allStudents.php",
      method:"POST",
      success:function(data){
        window.location.replace('allStudents.php?sort=id');
      }
    });
  }
</script>
</head>
<body>
<?php include("header.php"); ?>

<h2 class="text-center">School System Status</h2>
<h2 id="total">
  <?php
    $sql = "SELECT * FROM records;";
    $result = $db->query($sql);
    if (!$result) {
      trigger_error('Invalid query: ' . $db->error);
    }
    $row = $result->fetch_assoc();
    $count = $result->num_rows;
    echo "<a class=\"button\" id=\"viewall\" onclick=\"viewAll();\"><span style=\"font-size: 30px; cursor:pointer;\"><u>{$count}</u></span></a> Students Enrolled";
  ?>
</h2><br /><br />

<div id="tableView">
  <h2 class="text-center">Recently Added Students</h2>


  <div id="tableViewContents">
    <p style="float: left;">Name</p>
    <p style="float: right;">ID</p><br/><br/><br/>
    <?php
      echo "<ul id=\"tableViewResults\">\n";
      $sql = "SELECT name, surname, dob, ID, paid, email, `year` FROM schoolSystem.records ORDER BY ID DESC LIMIT 8;";
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
