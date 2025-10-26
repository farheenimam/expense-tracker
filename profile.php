<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    
    $sql = "SELECT name, email FROM users WHERE Id='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    } else {
        echo "User not found!";
        exit();
    }
    $conn->close();
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
    <?php include 'navbar.php'; ?>

    <div class="content">
        <h1>User Profile</h1>
        <p>Manage your account information</p>
    </div>

    <main>
        <section class="form-section">
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
                
        
            </div>
        </section>
    </main>
</body>
</html>