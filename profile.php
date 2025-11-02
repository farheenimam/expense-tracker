<?php
include 'db.php';
include 'navbar.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    
    $sql = "SELECT name, email FROM users WHERE Id='$id'";
    $sql1 = "SELECT SUM(amount) as total FROM income WHERE user_id='$id'";
    $sql2 = "SELECT SUM(amount) as total FROM expenses WHERE user_id='$id'";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    } else {
        echo "User not found!";
        exit();
    }
    
        $row1 = $result1->fetch_assoc();
        $income = $row1['total'];
        if ($income == NULL) {
            $income = 0;
        }
        
    $row2 = $result2->fetch_assoc();
    $expenses = $row2['total'];
    if ($expenses == NULL){
        $expenses = 0;
    }
    $conn->close();

    $total = $income - $expenses;
    if ($income == NULL || $expenses == NULL) {
        $total = 0;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Expense Tracker</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <div class="content">
        <h1>User Profile</h1>
        <p>Manage your account information</p>
    </div>

    <main>
            <h2>Profile Information</h2>
            <div class="profile-info">
                <div class="form-group">
                    <label><strong>Username:</strong></label>
                    <p><?php echo $name; ?></p>
                </div>
                
                <div class="form-group">
                    <label><strong>Email:</strong></label>
                    <p><?php echo $email; ?></p>
                </div>
                
                <div class="form-group">
                    <label><strong>Total Income:</strong></label>
                    <p><?php echo $income; ?></p >
                </div>
                <div class="form-group">
                    <label><strong>Total Expenses:</strong></label>
                    <p><?php echo $expenses;?></p>
                </div>
                <div class="form-group">
                    <label><strong>Balance:</strong></label>
                    <p><?php 
                    if ($total < 0) {
                        echo "Your balance is negative '" . $total . "'. You’ve spent more than your income!";
                    } else {
                        echo "Your balance: $" . $total;
                    }                 
                   ?></p>
                </div>
            </div>

    </main>
</body>
</html>