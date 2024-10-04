<?php
include("database.php");

if (isset($_GET['id'])) {
    $task_id = intval($_GET['id']); 

    
    $sql = "DELETE FROM tasks WHERE id = $task_id";

    if (mysqli_query($conn, $sql)) {
       
        header("Location: view.php?message=Task deleted successfully");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No task selected for deletion!";
}

mysqli_close($conn);
?>
