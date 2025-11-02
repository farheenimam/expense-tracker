<?php
include 'db.php';

$id = $_GET['e_id'];
$user_id = $_GET['id'];
$sql = "DELETE FROM expenses where e_id=$id";
if($conn->query($sql) === TRUE){
        header("Location: expenses.php?id=$user_id");
        exit();
    }
?>