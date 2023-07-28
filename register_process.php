<?php
// Include the database connection file
require_once("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    // Perform some basic validation on the data (you can add more validation as needed)
    if (empty($username) || empty($email) || empty($password) || empty($role) || empty($firstname) || empty($lastname)) {
        die("Please fill all required fields.");
    }

    // Check if the username or email already exists in the database
    $sql_check = "SELECT * FROM register WHERE username = '$username' OR email = '$email'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        die("Username or email already exists. Please choose a different one.");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to insert the data into the "register" table
    $sql = "INSERT INTO register (username, email, password, role, firstname, lastname)
            VALUES ('$username', '$email', '$hashed_password', '$role', '$firstname', '$lastname')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. You can now login.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

