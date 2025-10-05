<?php
// Database connection details
$servername = "localhost"; // or your host name
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "hotel_booking"; // your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkin_date = $_POST['checkinDate'];
    $checkout_date = $_POST['checkoutDate'];
    $room_type = $_POST['roomType'];
    $special_requests = $_POST['specialRequests'];

    // Prepare the SQL query
    $sql = "INSERT INTO bookings (full_name, email, phone, checkin_date, checkout_date, room_type, special_requests)
            VALUES ('$full_name', '$email', '$phone', '$checkin_date', '$checkout_date', '$room_type', '$special_requests')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Booking successfully stored!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
