<?php
include 'db.php';
include 'navbar.php';
// if the request is of get then display all the records
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET['id'])){
  header("Location: signup.php");
  exit();
}
  $id = $_GET['id'];
  $i_id = $_GET['i_id'];

  $sql = "SELECT * FROM income where user_id='$id' and i_id='$i_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $amount = $row['amount'];
    $source = $row['source'];
    $date = $row['date'];
  } else {
    echo "No record found!";
    exit();
  }
  $conn->close();

}

// if the user wants to update the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['id'];
    $id = $_POST['i_id'];
    $amount = $_POST['amount'];
    $source = $_POST['source'];
    $date = $_POST['date'];

    $sql = "UPDATE income SET amount='$amount', source='$source', date='$date' WHERE user_id='$user_id' AND i_id='$id'";
    print_r($user_id);
    if ($conn->query($sql) === TRUE) {
        header("Location: income.php?id=$user_id");
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
  <title>Update Income - Expense Tracker</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>


  <div class="content">
    <h1>Welcome to Your Expense Tracker</h1>
    <p>Use the navigation bar to view or add records.</p>
  </div>

  <section class="form-section">
    <h2>Update Income</h2>
    <form action="income_update.php" method="post">
      
      <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" value="<?php echo $amount; ?>" step="any" min="1" max="999999999" placeholder="Enter amount" required />
      </div>
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
      <input type="hidden" name="i_id" value="<?php echo $i_id; ?>" />
        
      <div class="form-group">
        <label for="source">Source: (max 15 characters)</label>
        <input type="text" id="source" name="source" pattern="^[A-Za-z ]{4,15}$" title="Only strings and max 15 characters and min 5 characters" value="<?php echo $source; ?>" placeholder="e.g. Salary" />
      </div>

      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $date; ?>" required />
      </div>

      <button type="submit" class="form-submit-btn">Update Income</button>
    </form>
  </section>
</body>
</html>