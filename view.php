<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="tableStyle.css">
</head>
<body>
    <div class="task-container">
        <div class="back-container"> 
            <a href="index.html"><button class="back-button">BACK</button></a>  
        </div>

        <h2>Task List</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
             <?php
              include("database.php");

            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM tasks"; 
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){ 
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['duedate'] . "</td>";
                    echo "<td>"; 
                    echo "<a href='editTask.php?id=" . $row['id'] . "'><button class='edit-button'>Edit</button></a> "; 
                    echo "<a href='deleteTask.php?id=" . $row['id'] . "'><button class='delete-button'>Delete</button></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No tasks found</td></tr>"; 
            }

            mysqli_close($conn);
             ?>
            </tbody>
        </table>
    </div>
</body>
</html>
