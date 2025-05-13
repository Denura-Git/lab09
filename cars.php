<?php
// Include the settings.php file for the database connection details
require_once("settings.php");

// Create a connection to the database
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check if the connection was successful
if ($dbconn) {
    echo "Connected to the database successfully!";
} else {
    echo "Unable to connect to the database.";
}
?>
