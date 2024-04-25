<?php
require('db.php');

$name = "";

echo "<link rel='stylesheet' type='text/css' href='style.css' />";

if (isset($_POST['name'])) {
    echo "<div class='container' >";
    echo "<table class='table table-bordered table-hover mt-3'>";
    echo "<tr>";
    echo "<th>Gym_Id</th>";
    echo "<th>Name</th>";
    echo "<th>Address</th>";
    echo "<th>Type</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</tr>";

    $name = $_POST['name'];

    $que = mysqli_query($conn, "SELECT * FROM `gym` WHERE CONCAT(`gym_id`,`gym_name`,`address`,`address`,`type`) LIKE '%" . $name . "%'");
    if (mysqli_num_rows($que) > 0) {
        while ($row = mysqli_fetch_array($que)) {
            echo "<tr>";
            echo "<td>" . $row['gym_id'] . "</td>";
            echo "<td>" . $row['gym_name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td><a href='home.php?id=$row[gym_id]&info=update_gym'><i class='fas fa-pencil-alt'></i></a></td>";
            echo "<td><a href='home.php?id=$row[gym_id]&info=delete_gym'><i class='fas fa-trash-alt'></i></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'><div class='alert alert-warning'><b>0 result</b></div></td></tr>";
    }
    echo "</table>"; // Close the table tag here
    echo "</div>"; // Close the container div here
}
?>
