<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h3>CONTACT FORM</h3>
    <form action="contact.php" method="POST">
        <table>
            <tr>
                <td><b>Name: </b></td><td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><b>Email: </b></td><td><input type="email" name="mail"></td>
            </tr>
            <tr>
                <td><b>Address: </b></td><td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td><b>Message: </b></td><td><textarea rows="5" cols="30" name="msg"></textarea></td>
            </tr>
        </table>
        <input type="submit">
    </form>
</body>
</html>

<?php
if(isset($_POST['name'], $_POST['mail'], $_POST['address'], $_POST['msg'])) {
    // Validate Name
    $name = trim($_POST['name']);
    if(empty($name)) {
        echo "Name is required";
    } else {
        $n = htmlspecialchars($name);
    }
    // Validate Email
    $email = trim($_POST['mail']);
    if(empty($email)) {
        echo "Email is required";
    } else {
        $e = htmlspecialchars($email);
    }

    // Validate Address
    $address = trim($_POST['address']);
    if(empty($address)) {
        echo "Address is required";
    } else {
        $add = htmlspecialchars($address);
    }

    // Validate Message
    $message = trim($_POST['msg']);
    if(empty($message)) {
        echo "Message is required";
    } else {
        $msg = htmlspecialchars($message);
    }

    // If all fields are validated, proceed with database insertion
    if(isset($n, $e, $add, $msg)) {
        $con= mysqli_connect("localhost","root","","customer_details");
        $sql="INSERT INTO customer_info(Name, Email, Address, Message) VALUES('$n','$e','$add','$msg')";
        $r=mysqli_query($con,$sql);
        if($r){
            echo "added";
        } else {
            echo "error in adding";
        }
    }
}
?>

