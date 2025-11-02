<?php
include 'db.php';

// if the request is of get then display all the records
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $e_id = $_GET['e_id'];
  $id = $_GET['id'];

  $sql = "SELECT * FROM expenses where user_id='$id' and e_id='$e_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $amount = $row['amount'];
    $description = $row['description'];
    $category = $row['category'];
    $date = $row['date'];
  } else {
    echo "No record found!";
    exit();
  }
  $conn->close();

}

// if the user wants to update the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $e_id = $_POST['e_id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $date = $_POST['date'];

    $sql = "UPDATE expenses SET amount='$amount', description='$description', category='$category', date='$date' WHERE user_id='$id' AND e_id='$e_id'";


    if ($conn->query($sql) === TRUE) {
        header("Location: expenses.php?id=$user_id");
        exit();
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Expenses - Expense Tracker</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php 
  include 'db.php';
  include 'navbar.php';
  ?>

  <div class="content">
    <h1>Welcome to Your Expense Tracker</h1>
    <p>Use the navigation bar to view or add records.</p>
  </div>

  <main>
    <section class="form-section">
      <h2>View/Update Expense</h2>
      <form id="expense-form" action="expenses_update.php" method="post">
        
        <div class="form-group">
          <label for="amount">Amount:</label>
          <input type="number" id="amount" name="amount" value="<?php echo $amount; ?>" step="any" min="1" max="9999999" placeholder="Enter amount" required />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="hidden" name="e_id" value="<?php echo $e_id; ?>" />
          
        <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" id="description" name="description" pattern="^[A-Za-z0-9 ]{3,50}$" title="Only strings and max 50 characters" value="<?php echo $description; ?>" placeholder="Enter description" />
        </div>

        <div class="form-group">
          <label for="category">Category:</label>
          <input type="text" id="category" name="category" pattern="^\S{2,15}$"  title="Only strings and max 15 characters" value="<?php echo $category; ?>" placeholder="Enter category" />
        </div>

        <div class="form-group">
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" value="<?php echo $date; ?>" required />
        </div>

        <button type="submit" class="form-submit-btn">Update Expense</button>
      </form>
    </section>
  </main>
</body>
</html>
