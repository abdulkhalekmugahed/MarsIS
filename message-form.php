<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marsis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Get form data from POST request
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message']; 

// SQL query to insert form data into the database
$query1 = "insert into message_form (name, email, message) values('$name', '$email', '$message')";

// Execute the query and check for success
if (mysqli_query($conn, $query1)) {
    echo "New record created successfully";
} else {
    // Display an error message if the query fails
    echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
}

$query2 = "SELECT * FROM message_form";

$record = mysqli_query($conn, $query2); 

echo "<table border='2'>";
echo "<tr> <td>name</td> <td>email</td> <td>message</td> </tr>";
// Use mysqli_fetch_assoc() to get an associative array
while ($row = mysqli_fetch_assoc($record)) { 
    echo "<tr><td>" . $row['name'] . "</td>" .
        "<td>" . $row['email'] . "</td>" .
        "<td>" . $row['message'] . "</td></tr>";
}

echo "</table>";

// Close the database connection
mysqli_close($conn); 
?>
