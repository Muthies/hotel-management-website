<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="login.PNG">
    <link rel="stylesheet" href="style2.css">
</head>
<body style="background-image: url(wc3.png);background-repeat: no-repeat;background-size: cover;">
    <div class="header">
        <img src="logo.PNG" alt="Logo" class="logo">
        <ul class="nav">
            <a href="book.html"><li><h4 style="color: black;">STAY |</h4></li></a>
            <a href="dine.html"><li><h4 style="color: black;">DINE |</h4></li></a>
            <a href="gallery.html"><li><h4 style="color: black;">GALLERY |</h4></li></a>
            <a href="mailto:info@seasidesiesta.com" style="color: black;"><li><h4>CONTACT |</h4></li></a>
            <a style="color: black;" href="index.html"><li><h4 style="color: black;">HOME </h4></li></a>
        </ul>
    </div>
    <div class="login-container">
        <div class="image-container">
            <img src="half.jpg">
        </div>
        <div class="form-container">
            <center>
                <h2 class="log">LOGIN</h2>
                <form action="login1.php" method="POST">
                    <input type="text" name="username" placeholder="Username*" class="input"><br>
                    <input type="email" name="email" placeholder="Email*" class="input"><br>
                    <input type="text" name="phoneNumber" placeholder="PhoneNumber*" class="input"><br>
                    <button type="submit" class="bt" style="margin-top: 30px; width: 100px; height: 40px;">Login</button>
                </form>
            </center>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    // Connect to the database (replace dbname, username, and password with your actual database credentials)
    $conn = new mysqli('localhost', 'root', '', 'database_name');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database (replace 'users' with your actual table name)
    $sql = "INSERT INTO login_detail (username, email, phoneNumber) VALUES ('$username', '$email', '$phoneNumber')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        echo "<script>alert('Logged in successfully.')</script>";
    } else {
        // Error in insertion
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
