<?php
// Include the database connection file
require_once("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $old_drug_name = $_POST["old_drug_name"];
    $new_drug_name = $_POST["new_drug_name"];
    $new_description = $_POST["new_description"];
    $new_quantity = $_POST["new_quantity"];
    $new_price = $_POST["new_price"];

    // Update the drug in the database
    $sql = "UPDATE drugs SET drug_name = '$new_drug_name', description = '$new_description', quantity = '$new_quantity', price = '$new_price' WHERE drug_name = '$old_drug_name'";

    if (mysqli_query($conn, $sql)) {
        echo "Drug updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Display the drug list from the database
$sql = "SELECT * FROM drugs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Head section with meta, title, and CSS link -->
    <title>Edit Drugs</title>
    <style>
        /* Additional styles for the drug addition form */
body {
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Optional: Hover and Focus styles for the button */
button:hover,
button:focus {
    background-color: #555;
}

    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Edit Drugs</h1>
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo '<form action="edit_drug.php" method="post">';
            echo '<label for="old_drug_name">Select Drug:</label>';
            echo '<select id="old_drug_name" name="old_drug_name" required>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['drug_name'] . '">' . $row['drug_name'] . '</option>';
            }
            echo '</select>';

            echo '<label for="new_drug_name">New Drug Name:</label>';
            echo '<input type="text" id="new_drug_name" name="new_drug_name" required>';

            echo '<label for="new_description">New Description:</label>';
            echo '<textarea id="new_description" name="new_description" required></textarea>';

            echo '<label for="new_quantity">New Quantity:</label>';
            echo '<input type="number" id="new_quantity" name="new_quantity" required>';

            echo '<label for="new_price">New Price:</label>';
            echo '<input type="number" id="new_price" name="new_price" required>';

            echo '<input type="submit" value="Edit">';
            echo '</form>';
        } else {
            echo "<p>No drugs found.</p>";
        }
        ?>
    </div>
</body>
</html>
