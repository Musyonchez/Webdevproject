<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
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

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #555;
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
        <h1>Welcome, Administrator</h1>
        <a href="add_drug.php">Add New Drug</a>
        <a href="display_drug.php">Display drugs</a>
            <a href="index.php"><button type="button">home</button></a>
<a href="display_pharmacist.php">Display pharmacist</a>
        <a href="display_patient.php">Display patient</a>
        <a href="display_administrator.php">Display administrator</a>
        <a href="display_doctor.php">Display doctor</a>
                <a href="edit_drugs.php">Edit drugs</a>


    </div>
</body>
</html>
