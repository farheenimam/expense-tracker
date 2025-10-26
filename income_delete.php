<?php
include 'db.php';
print_r($_GET);
$id = $_GET['id'];
$user_id = $_GET['user_id'];
$sql = "DELETE FROM income where i_id=$id";
if($conn->query($sql) === TRUE){
        header("Location: income.php?id=$user_id");
        exit();
    }
?>