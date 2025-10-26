<?php
//Code to insert the data
// Including the database file
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Collect form data safetly into the below varaiable

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Prepare the SQL query to insert data
    $sql = "INSERT INTO  income (name, email, age) VALUES ('$name', '$email', '$age')";

    // Run the query and check if successful
    if ($conn->query($sql) === TRUE){// To check the data type and the varaiable value to be more sure
        echo "<h2> Student Registered Successfully!<h2>";
        echo "<p><a href='index.html'>Go back</a></p>";
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
    //CLose the database connection
    $conn->close();

}
?>
