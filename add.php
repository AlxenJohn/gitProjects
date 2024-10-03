<?php 
   include("database.php");

$title = $_POST['title'];
$description = $_POST['description'];
$duedate = $_POST['duedate'];

$sql = "INSERT INTO tasks(title, description, duedate) VALUES ('$title', '$description', '$duedate')";

try{
   mysqli_query($conn, $sql);
   echo"User is now registered";
}
catch(mysqli_sql_exception){
   echo"Could not register user";
}

mysqli_close($conn);

?>