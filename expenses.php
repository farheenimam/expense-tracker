<?php
// We will list the expenses of all the users here
include 'db.php';

$id = $_GET['id'];
$search = "";

// Check if search is submitted
if (isset($_GET['search']) && $_GET['search'] != "") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM expenses WHERE user_id='$id' AND description LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM expenses WHERE user_id='$id'";
}

$result = $conn->query($sql);

$conn->close();

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
  <?php include 'navbar.php'; ?>

<section class="form-section">
  <section class="table-section">
      <h2>Expenses Records</h2>
      
      <!-- Search Bar -->
      <form method="GET" action="expenses.php" class="search-form">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="search" placeholder="Search by description..." value="<?php echo $search; ?>" class="search-input">
        <button type="submit" class="search-btn">Search</button>
        
        <a href="expenses.php?id=<?php echo $id; ?>"><button type="button" class="clear-btn">Clear</button></a>
      </form>
      
      <table>
        <thead>
          <tr>
            <th>Amount</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
           if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .$row['amount']. "</td>
                <td>".$row['description']."</td>
                <td>".$row['category']."</td>
                <td><a href='expenses_delete.php?id=" .$row['user_id']. "&e_id=" .$row['e_id']."'><button class=\"delete-btn\">Delete</button></a>
                <a href='expenses_update.php?id=" .$row['user_id']. "&e_id=" .$row['e_id']."'><button class=\"edit-btn\">View Detail</button></a></td>
                </tr>";
                $total += $row['amount'];
            }
        }
        else {
            if ($search != "") {
                echo "<tr><td colspan='4'>No expenses found for '$search'</td></tr>";
            } else {
                echo "<tr><td colspan='4'>No expenses found</td></tr>";
            }
        }
          ?>
        </tbody>
        
      </table>
      <div class="profile-info">
     <p> Total expenses: <?php echo $total;?></p>
    </div>
    </section>
</section>
  </main>
</body>
</html>
 
 
 
