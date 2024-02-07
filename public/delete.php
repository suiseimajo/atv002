<?php
//including the database connection file
$pdo = require_once "../database.php";

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM events WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' => $id));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>