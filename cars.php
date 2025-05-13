<?php
// Step 1: Include the settings.php file for database connection details
require_once("settings.php");

// Step 2: Establish a connection to the database
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Step 3: Check if the connection was successful
if ($dbconn) {
    // Connection successful, proceed to query the database

    // Step 4: Create an SQL query to fetch all records from the cars table
    $query = "SELECT * FROM cars";

    // Step 5: Execute the SQL query
    $result = mysqli_query($dbconn, $query);

    // Step 6: Check if the query returned any results
    if ($result) {
        // If results exist, start displaying the table

        // Open the table and create headers for the columns
        echo "<table border='1'>";
        echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year of Manufacture</th></tr>";

        // Step 7: Loop through the result and display each car record in a table row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }

        // Close the table after displaying all records
        echo "</table>";
    } else {
        // If no results, display a message indicating no records
        echo "<p>No cars found in the database.</p>";
    }

    // Step 8: Close the database connection
    mysqli_close($dbconn);
} else {
    // If connection fails, display an error message
    echo "<p>Unable to connect to the database.</p>";
}
?>
