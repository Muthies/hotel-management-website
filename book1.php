<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $Room = $_POST['numRooms'];
	$adult = $_POST['numAdults'];
    $children = $_POST['numChildren'];

    // Connect to the database (replace dbname, username, and password with your actual database credentials)
    $conn = new mysqli('localhost', 'root', '', 'database_name');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database (replace 'users' with your actual table name)
    $sql = "INSERT INTO booking_detail (check_in, check_out, num_rooms, num_adults, num_children) VALUES ('$checkIn', '$checkOut', '$Room', '$adult', '$children')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        echo "<script>alert('Booked successfully. Enjoy your stay.')</script>";
    } else {
        // Error in insertion
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
