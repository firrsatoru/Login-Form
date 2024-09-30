<?php
require "../service/database.php";
require "../service/function.php";

if ( isset($_POST["register"]) ) {
    if ( register($_POST) > 0 ) {
        echo "
            <script>
                alert('Success');
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.4/collection/components/icon/icon.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Courier New', monospace;
            background-color: #1b1b1b;
            color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-card {
            background-color: #282828;
            border: 3px solid #3e3e3e;
            border-radius: 15px;
            width: 320px;
            padding: 25px;
            box-shadow: 0px 0px 15px 3px #000;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .signup-card h3 {
            font-size: 26px;
            color: #00d1ff;
            margin-bottom: 25px;
        }

        .signup-card label {
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #f0f0f0;
            margin-bottom: 10px;
            text-align: left;
        }

        .signup-card label ion-icon {
            margin-right: 10px;
            color: #00d1ff;
        }

        .signup-card input[type="text"],
        .signup-card input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #3e3e3e;
            border-radius: 10px;
            background-color: #1b1b1b;
            color: #f0f0f0;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .signup-card input[type="text"]:focus,
        .signup-card input[type="password"]:focus {
            border-color: #00d1ff;
            outline: none;
        }

        .signup-card button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-color: #00d1ff;
            color: #282828;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .signup-card button:hover {
            background-color: #00aaff;
        }

        .signup-card .register {
            margin-top: 15px;
            font-size: 14px;
            color: #a0a0a0;
        }

        .signup-card .register a {
            color: #00d1ff;
            text-decoration: none;
        }

        .signup-card .register a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="signup-card">
        <h3>Sign Up</h3>
        <form action="" method="POST">
            <label for="username">
                <ion-icon name="person-outline"></ion-icon>
                Username:
            </label>
            <input type="text" name="username" id="username" required>

            <label for="password">
                <ion-icon name="lock-closed-outline"></ion-icon>
                Password:
            </label>
            <input type="password" name="password" id="password" required>

            <label for="password2">
                <ion-icon name="lock-closed-outline"></ion-icon>
                Confirm Password:
            </label>
            <input type="password" name="password2" id="password2" required>

            <button type="submit" name="register">Sign Up</button>
        </form>

        <div class="register">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
