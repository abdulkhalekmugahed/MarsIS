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

if (isset($_POST['submit'])) {
    // Get form data from POST request
    $studentName = $_POST['studentName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob']; 
    $grade = $_POST['grade'];
    $contactNumber = $_POST['contactNumber'];       
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // SQL query to insert form data into the database
    $query1 = "INSERT INTO registration_form (studentName, gender, DOB, grade, contactNumber, email, comment) VALUES
     ('$studentName', '$gender', '$dob', '$grade', '$contactNumber', '$email', '$comment')";

    // Execute the query and check for success
    if (mysqli_query($conn, $query1)) {
        echo "New record created successfully";
    } else {
        // Display an error message if the query fails
        echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
    }
}

$query2 = "SELECT * FROM registration_form";

$record = mysqli_query($conn, $query2); 

echo "<table border='2'>";
echo "<tr> <td>studentName</td> <td>Gender</td> <td>DOB</td> <td>Grade</td>
   <td>Contact_Number</td> <td>Email</td> <td>Comment</td> </tr>";
// Use mysqli_fetch_assoc() to get an associative array
while ($row = mysqli_fetch_assoc($record)) { 
    echo "<tr><td>" . $row['studentName'] . "</td>" .
        "<td>" . $row['gender'] . "</td>" .
        "<td>" . $row['DOB'] . "</td>" .
        "<td>" . $row['grade'] . "</td>" .
        "<td>" . $row['contactNumber'] . "</td>" .
        "<td>" . $row['email'] . "</td>" .
        "<td>" . $row['comment'] . "</td></tr>";
}

echo "</table>";

// Close the database connection
mysqli_close($conn); 
?>
