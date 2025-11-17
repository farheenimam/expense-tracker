<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Expense Tracker</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="auth-body">
    <?php include 'navbar2.php'; ?>

    <div class="auth-container">
        <h1>Welcome Back!</h1>
        <p>Please enter your details to log in.</p>
        <form action="login.php" method="POST" class="auth-form">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" pattern="^\S{5,50}$" title="Enter valid email" placeholder="Email" required>
            <label for="password"></label>
            <input type="password" id="password" name="password" pattern="^\S{8,20}$" title="Password: 8-20 characters, no spaces" placeholder="Password (8-20 characters)" required>
            <button type="submit">Login</button>
        </form>
        <p class="auth-switch">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>

</body>
</html>
<?php
include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($password == "" || $email == ""){
             ?>
            <script>
                alert("Invalid email or password!");
            </script>
            <?php
        }


        $sql ="select Id from users where email='$email' and password='$password'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            $id = $rows['Id'];
            header("Location: expenses_form.php?id=$id");
        } else {
            ?>
            <script>
                alert("Invalid password/email");
            </script>
            <?php
        }

    }
?>