<?php
// Include the settings.php file to connect to the database
require_once("settings.php");

// Step 1: Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 2: Retrieve the form data from the POST request
    $make = $_POST['make'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $yom = $_POST['yom'];

    // Step 3: Establish a connection to the database
    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

    // Step 4: Check if the connection was successful
    if ($dbconn) {
        // Step 5: Insert the data into the cars table
        $query = "INSERT INTO cars (make, model, price, yom) 
                  VALUES ('$make', '$model', $price, $yom)";
        $result = mysqli_query($dbconn, $query);

        // Step 6: Check if the insertion was successful
        if ($result) {
            echo "<p>New car has been added successfully!</p>";
        } else {
            echo "<p>Error inserting car: " . mysqli_error($dbconn) . "</p>";
        }

        // Step 7: Close the database connection
        mysqli_close($dbconn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
}
?>

<!-- Step 8: Display the HTML form for inserting a new car -->
<h2>Add a New Car</h2>
<form method="POST" action="add_car.php">
    <label for="make">Car Make:</label>
    <input type="text" name="make" id="make" required><br><br>

    <label for="model">Car Model:</label>
    <input type="text" name="model" id="model" required><br><br>

    <label for="price">Car Price:</label>
    <input type="number" name="price" id="price" required><br><br>

    <label for="yom">Year of Manufacture:</label>
    <input type="number" name="yom" id="yom" required><br><br>

    <input type="submit" value="Add Car">
</form>
