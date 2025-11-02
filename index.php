<<<<<<< HEAD
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
         ?>
       <script>
        alert("Email already exists!");
       </script>
       <?php
    }
    else{
        $sql ="INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE){
            header("Location: login.php");
            exit();
        } else {
          echo "Error: " . $conn->error;
     
        }
    }


    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Expense Tracker</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="auth-body">

    <div class="auth-container">
        <h1>Create Account</h1>
        <p>Join us by creating a new account.</p>
        <form action="index.php" method="POST" class="auth-form">
            <input type="text" name="username" pattern="^[a-zA-Z ]{3,20}$" title="Username: 3-20 characters, letters and spaces only" placeholder="Username (3-20 characters)" required>
            <input type="email" name="email" pattern="^\S{5,50}$" title="Enter valid email" placeholder="Email" required>
            <input type="password" name="password" pattern="^\S{8,20}$" title="Password: 8-20 characters, no spaces" placeholder="Password (8-20 characters)" required>
            <button type="submit">Sign Up</button>
        </form>
        <p class="auth-switch">Already have an account? <a href="login.php">Login</a></p>
    </div>

</body>

</html>
=======
<?php
include 'db.php';

$success_message = "";
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
         ?>
       <script>
        alert("Email already exists!");
       </script>
       <?php
    }
    else{
        $sql ="INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE){
            header("Location: login.php");
            exit();
        } else {
          echo "Error: " . $conn->error;
     
        }
    }


    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Expense Tracker</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="auth-body">

    <div class="auth-container">
        <h1>Create Account</h1>
        <p>Join us by creating a new account.</p>
        <form action="index.php" method="POST" class="auth-form">
            <input type="text" name="username" pattern="^[a-zA-Z ]{3,20}$" title="Username: 3-20 characters, letters and spaces only" placeholder="Username (3-20 characters)" required>
            <input type="email" name="email" pattern="^\S{5,50}$" title="Enter valid email" placeholder="Email" required>
            <input type="password" name="password" pattern="^\S{8,20}$" title="Password: 8-20 characters, no spaces" placeholder="Password (8-20 characters)" required>
            <button type="submit">Sign Up</button>
        </form>
        <p class="auth-switch">Already have an account? <a href="login.php">Login</a></p>
    </div>

</body>
</html>
>>>>>>> d8182d1 (Initial commit - Expense Tracker Application)
