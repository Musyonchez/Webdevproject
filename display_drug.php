<?php
// Include the database connection file
require_once("connection.php");

// Retrieve the list of drugs from the database
$sql = "SELECT * FROM drugs";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Existing Drugs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Existing Drugs</h1>
        <table>
            <tr>
                <th>Drug Name</th>
                <th>Decription</th>
                <th>quantity</th>
                <th>Price</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["drug_name"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>$" . $row["quantity"] . "</td>";
                    echo "<td>$" . $row["price"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No drugs found.</td></tr>";
            }
            ?>
        </table>

                    <a href="index.php"><button type="button">home</button></a>

    </div>
</body>
</html>
