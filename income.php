<?php
// We will list the income of all the users here
include 'db.php';
include 'navbar.php';

if (!isset($_GET['id'])){
  header("Location: index.php");
  exit();
}
$id = $_GET['id'];
$search = "";

// Check if search is submitted
if (isset($_GET['search']) && $_GET['search'] != "") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM income WHERE user_id='$id' AND source LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM income WHERE user_id='$id'";
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

<section class="form-section">
  <section class="table-section">
      <h2>Income Records</h2>
      
      <!-- Search Bar -->
      <form method="GET" action="income.php" class="search-form">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="search" placeholder="Search by sorce..." pattern="^[A-Za-z\s]{5, 15}$" value="<?php echo $search; ?>" class="search-input">
        <button type="submit" class="search-btn">Search</button>
        <a href="income.php?id=<?php echo $id; ?>"><button type="button" class="clear-btn">Clear</button></a>
      </form>
      
      <table>
        <thead>
          <tr>
            <th>Amount</th>
            <th>Source</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
           if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .$row['amount']. "</td>
                <td>" .$row['source']. "</td>
                <td>".$row['date']."</td>
                <td><a href='income_delete.php?id=" .$row['user_id']. "&i_id=" .$row['i_id']."'><button class=\"delete-btn\">Delete</button></a>
                <a href='income_update.php?id=" .$row['user_id']. "&i_id=" .$row['i_id']."'><button class=\"edit-btn\">Edit</button></a></td>
                </tr>";
                $total += $row['amount'];
            }
          }
        else {
            if ($search != "") {
                echo "<tr><td colspan='4'>No income found for '$search'</td></tr>";
            } else {
                echo "<tr><td colspan='4'>No income found</td></tr>";
            }
        }
          ?>
        </tbody>
      </table>
    </section>
      <div class="profile-info">
     <strong><p> Total income: <?php echo $total;?></p></strong>
    </div>
</section>
</body>
</html>
 
 
 
