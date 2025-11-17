<?php
include 'db.php';
if (!isset($_GET['id']) || $_GET['id'] == NULL ){
  header("Location: signup.php");
  exit();
}
$id = $_GET['i_id'];
$user_id = $_GET['id'];
$sql = "DELETE FROM income where i_id=$id";
if($conn->query($sql) === TRUE){
        header("Location: income.php?id=$user_id");
        exit();
    }
?>