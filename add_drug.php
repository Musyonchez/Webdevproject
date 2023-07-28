<?php
// Include the database connection file
require_once("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $drug_name = $_POST["drug_name"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    // Perform some basic validation on the data (you can add more validation as needed)
    if (empty($drug_name) || empty($description) || empty($quantity) || empty($price)) {
        die("Please fill all required fields.");
    }

    // Prepare and execute the SQL query to insert the drug data into the "drugs" table
    $sql = "INSERT INTO drugs (drug_name, description, quantity, price)
            VALUES ('$drug_name', '$description', '$quantity', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Drug added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Add Drug</title>
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
    <div class="container">
        <h2>Add Drug</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Input fields for drug details -->
            <label for="drug_name">Drug Name</label>
            <input type="text" id="drug_name" name="drug_name" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>

            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" required>

            <label for="price">Price</label>
            <input type="number" id="price" name="price" required>

            <button type="submit">Add Drug</button>
            
        </form>
    </div>
</body>
</html>
