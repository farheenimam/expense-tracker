<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    
    // amount	description	category	date	user_id	
    $sql = "INSERT INTO expenses (amount, description, category, date, user_id) VALUES ('$amount', '$description', '$category', '$date', '$id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: expenses.php?id=$id");
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

  <section class="form-section">
    <h2>Add Expenses</h2>
    <form id="expense-form" action="expenses_form.php" method="post">
      
      <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="any" min="1" max="9999999" placeholder="Enter amount" required />
      </div>
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
        
      <div class="form-group">
        <label for="description">Description (max 50 characters):</label>
        <input type="text" id="description" name="description" pattern="^[A-Za-z0-9 ]{3,50}$" title="Letters, numbers, and spaces only (3-50 characters)" placeholder="Enter description" required/>
      </div>

      <div class="form-group">
        <label for="category">Category (max 15 characters):</label>
        <input type="text" id="category" name="category" pattern="^\S{2,15}$" title="Only strings and max 15 characters" placeholder="Enter category" required />
      </div>

      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required />
      </div>

      <button type="submit" class="form-submit-btn">Add Expense</button>
    </form>
  </section>
</body>
</html>

