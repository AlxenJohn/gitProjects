<?php
include("database.php");

if(isset($_GET['id'])) {
    $task_id = $_GET['id'];


    $sql = "SELECT * FROM tasks WHERE id = $task_id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $description = $row['description'];
        $duedate = $row['duedate'];
    } else {
        echo "Task not found!";
        exit();
    }
} else {
    echo "No task selected!";
    exit();
}

if(isset($_POST['update_task'])) {
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $duedate = mysqli_real_escape_string($conn, $_POST['duedate']);

    
    $update_sql = "UPDATE tasks SET title='$title', description='$description', duedate='$duedate' WHERE id=$task_id";

    if(mysqli_query($conn, $update_sql)) {
        header("Location: view.php"); 
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="task-container">
        <h2>Edit Task</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $title; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
            </div>

            <div class="form-group">
                <label for="duedate">Due Date</label>
                <input type="date" id="duedate" name="duedate" value="<?php echo $duedate; ?>" required>
            </div>

            <div class="form-group">
                <button type="submit" name="update_task" class="update-button">Update Task</button>
            </div>
            <div class="form-group">
                <a href="view.php"><button type="button" class="cancel-button">Cancel</button></a>
            </div>
        </form>
    </div>
</body>
</html>
