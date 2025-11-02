<?php
include 'db.php';
include 'navbar.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];
  if (!isset($_GET['id'])){
  header("Location: index.php");
  exit();
}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    print_r($_POST);
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $source = $_POST['source'];
    $date = $_POST['date'];
    // amount	description	category	date	user_id	
    $sql = "INSERT INTO income (amount, source, date, user_id) VALUES ('$amount', '$source', '$date', '$id')";
    if ($conn->query($sql) === TRUE) {
        header("Location: income.php?id=$id");
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
  <title>Expense Tracker</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  

  <div class="content">
    <h1>Welcome to Your Expense Tracker</h1>
    <p>Use the navigation bar to view or add records.</p>
  </div>

  <section class="form-section">
    <h2>Add Income</h2>
    <form action="income_form.php" method="POST">
      <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" id="amount" name="amount" step="any" min="1" max="999999" placeholder="Enter amount" required />
      </div>

      <input type="hidden" name="id" value="<?php echo $id; ?>" />

      <div class="form-group">
        <label for="source">Source: (max 15 characters)</label>
        <input type="text" id="source" name="source"  title="Only strings and max 15 characters" pattern="^[A-Za-z]{5,15}$" placeholder="e.g. Salary" />
      </div>

      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required />
      </div>
      <button type="submit" class="form-submit-btn">Add Income</button>
    </form>
 </section>
</body>
</html>


