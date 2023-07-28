<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Home Page</title>
    <style>
        /* Additional styles for the home page */
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            overflow: hidden; /* Hide scrollbars */
        }

        .container {
            position: relative;
            overflow: hidden;
            height: 100vh; /* Set the container height to fit the screen */
        }

        .background-image {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            max-width: 100px; /* Set the maximum width of the logo image */
            height: auto; /* Maintain aspect ratio */
            margin-right: 10px;
            opacity: 0.6; /* Set the logo opacity for the watermark effect */
        }

        .login-register {
            display: flex;
        }

        .login-register button {
            margin-left: 10px;
        }

        /* Style for the motto inside the background */
        .motto {
            position: absolute;
            bottom: 10px; /* Adjust this value to control the vertical placement */
            left: 50%;
            transform: translateX(-50%); /* Center the text horizontally */
            font-size: 18px;
            color: #fff;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 5px 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <img class="background-image" src="images/backg.jpg" alt="Home Image">
        
        <div class="header">
            <!-- Logo -->
            <div class="logo">
                <img src="images/logo.png" alt="Your Logo">
            </div>
            
            <!-- Login and Register buttons -->
            <div class="login-register">
                <a href="login.php"><button>Login</button></a>
                <a href="registration.php"><button>Register</button></a>
            </div>
        </div>

        <!-- Motto at the bottom of the background -->
        <div class="motto">
            Your One-Stop Shopping for All Illnesses
        </div>
    </div>

</body>
</html>
