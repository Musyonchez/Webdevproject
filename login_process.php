<?php
// Include the database connection file
require_once("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform some basic validation on the data (you can add more validation as needed)
    if (empty($username) || empty($password)) {
        die("Please fill all required fields.");
    }

    // Prepare and execute the SQL query to check if the user exists
    $sql = "SELECT * FROM register WHERE username = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password using password_verify() function
        if (password_verify($password, $row["password"])) {
            // Password is correct, login successful
            // Set the session variables for username and role
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $row["role"];

            // Redirect to the appropriate dashboard page based on the role
            switch ($row["role"]) {
                case "patient":
                    header("Location: patient_dashboard.php");
                    break;
                case "doctor":
                    header("Location: doctor_dashboard.php");
                    break;
                case "pharmacist":
                    header("Location: pharmacist_dashboard.php");
                    break;
                case "administrator":
                    header("Location: admin_dashboard.php");
                    break;
                default:
                    // Handle unknown roles or errors
                    die("Unknown role encountered.");
            }

            // Stop further execution after redirecting
            exit();
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User not found. Please check your username.";
    }
}
?>
