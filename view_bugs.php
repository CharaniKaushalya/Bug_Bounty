<?php
include 'db_config.php';

$sql = "SELECT title, description, severity, status FROM bugs";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>View Bugs</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
        <h2>List of Bugs</h2>
        <div class="form-box">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Severity</th>
                    <th>Status</th>
                </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['severity'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No bugs reported</td></tr>";
        }
        $conn->close();
        /*Function: 
        This retrieves all the bugs in the database and displays them to the users. 
        Gives title, description, severity, and status of bugs. 
        Showing these open bugs allows users to track their issues and see progress.
        
        Here, all the bugs in the bugs table in the database are fetched and displayed in an HTML site. 
        It is displayed as title, description, severity, and status. This is useful in bug tracking.*/
        ?>
    </table>
</body>
</html>

