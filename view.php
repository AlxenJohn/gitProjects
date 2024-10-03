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
        <div class="Back-styles">
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
                </tr>
            </thead>
            <tbody>
             <?php
              include("database.php");

            if($conn-> connect_error){
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM tasks"; // Define the SQL query
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){ // Loop through the results
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['duedate'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No tasks found</td></tr>";
            }

            mysqli_close($conn);
             ?>
           
            </tbody>
        </table>
    </div>
</body>
</html>