<<<<<<< HEAD
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];
}
?>
<!-- navbar.php -->
<nav class="navbar">
  <div class="nav-container">
    <h2 class="logo">Expense Tracker</h2>
    <ul class="nav-links">
      <?php
      ECHO "
      <li><a href=\"income.php?id=$id\">Income Records</a></li>
      <li><a href=\"expenses.php?id=$id\">Expense Records</a></li>
      <li><a href=\"expenses_form.php?id=$id\">Add expenses</a></li>
      <li><a href=\"income_form.php?id=$id\">Add income</a></li>
      <li><a href=\"profile.php?id=$id\">Profile</a></li>
      <li><a href=\"index.php\">Logout</a></li>
      "
      ?>
    </ul>
  </div>
</nav>

=======
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];
}
?>
<!-- navbar.php -->
<nav class="navbar">
  <div class="nav-container">
    <h2 class="logo">Expense Tracker</h2>
    <ul class="nav-links">
      <?php
      ECHO "
      <li><a href=\"income.php?id=$id\">Income Records</a></li>
      <li><a href=\"expenses.php?id=$id\">Expense Records</a></li>
      <li><a href=\"expenses_form.php?id=$id\">Add expenses</a></li>
      <li><a href=\"income_form.php?id=$id\">Add income</a></li>
      <li><a href=\"profile.php?id=$id\">Profile</a></li>
      <li><a href=\"index.php\">Logout</a></li>
      "
      ?>
    </ul>
  </div>
</nav>

>>>>>>> d8182d1 (Initial commit - Expense Tracker Application)
