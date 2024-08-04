<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $guestname = $_POST['guestName'];
    $restaurant = $_POST['restaurantName'];
    $date = $_POST['date'];
	$contact = $_POST['mobileNumber'];
    $email = $_POST['email'];
	$reservation = $_POST['reservationType'];



    // Connect to the database (replace dbname, username, and password with your actual database credentials)
    $conn = new mysqli('localhost', 'root', '', 'database_name');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database (replace 'users' with your actual table name)
    $sql = "INSERT INTO dine_detail (guest_name, restaurant_name, date, mobile_number, email, reservation_type) VALUES ('$guestname', '$restaurant', '$date' ,'$contact' ,'$email', '$reservation')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        echo "<script>alert('Booked successfully.')</script>";
    } else {
        // Error in insertion
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
