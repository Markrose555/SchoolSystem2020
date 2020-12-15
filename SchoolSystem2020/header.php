
<style>
.show {display: block;}
</style>
<div id="header">
  <img style="display: block; margin-left:auto; margin-right:auto;" src="images/schsys.png"></img>
</div>
<div id="sidebar">
  <div id="sidebar-buttons">
    <ul class="menu">
      <li class="menu-item"><a href="home.php">Home</a></li><br />
      <li class="menu-item"><a href="unpaid.php">Unpaid Tuitions</a></li><br />
      <li><a onclick="myFunction()" class="menu-item-record">Records</a></li><br />
      <div id="dropdown" class="dropdown-content">
        <li class="menu-item"><a href="add.php">Add Record</a></li><br />
        <li class="menu-item"><a href="edit.php">Edit Record</a></li><br />
        <li class="menu-item"><a href="remove.php">Remove Record</a></li><br />
        <li class="menu-item"><a href="allStudents.php?sort=id">View All</a></li><br />
      </div>
      <li class="menu-item"><a href="about.php">About</a></li><br />
    </ul>
  </div>

  <?php
  $imagesDir = 'ads/';

  $images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

  $randomImage = $images[array_rand($images)];
  echo "<img id=\"ad\" draggable=\"false\" src=\"{$randomImage}\"></img>";
  ?>
</div>
<div id="sidebar-right">
  <div id="sidebar-buttons">
    <div class="topnav-right">
      <p>Welcome, <?php echo $_SESSION['login_user']; ?></p>
    </div>
    <ul class="menu">
    <li class="menu-item-right"><a href="settings.php">Account Settings</a></li><br />
    <li class="menu-item-right"><a href="logout.php">Logout</a></li><br />
    </ul>
    <br />
    <ul class="menu">
      <li><?php
      include 'calendar.php';
      $calendar = new Calendar();
      echo $calendar->show();
      ?></li>
    </ul>
  </div>
</div>
<script>
var height = $('.fullContainer').height()

$('.sidebar').height(height)
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("dropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.menu-item-record')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
