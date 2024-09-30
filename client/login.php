<?php

session_start();


require "../service/database.php";
require "../service/function.php";

if ( isset($_SESSION["login"]) ) {
    header("Location: ../index.php");
}

if ( isset($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $data = "";

    $result = mysqli_query($conn, "SELECT * FROM user_account WHERE username = '$username'");

    if ( mysqli_num_rows($result) === 1 ) {
        $row = mysqli_fetch_assoc($result);

        if ( password_verify($password, $row["password"]) ) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            header("Location: ../index.php");
            exit();
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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

        .login-card {
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

        .login-card h3 {
            font-size: 26px;
            color: #00d1ff;
            margin-bottom: 25px;
        }

        .login-card p {
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .login-card label {
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #f0f0f0;
            margin-bottom: 10px;
            text-align: left;
        }

        .login-card label ion-icon {
            margin-right: 10px;
            color: #00d1ff;
        }

        .login-card input[type="text"],
        .login-card input[type="password"] {
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

        .login-card input[type="text"]:focus,
        .login-card input[type="password"]:focus {
            border-color: #00d1ff;
            outline: none;
        }

        .login-card button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-image: linear-gradient(135deg, #00d1ff, #007acc);
            color: #282828;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .login-card button:hover {
            background-image: linear-gradient(135deg, #00aaff, #005f99);
            transform: scale(1.05);
        }

        .login-card .options {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-top: 15px;
            color: #a0a0a0;
        }

        .login-card .options label {
            display: flex;
            align-items: center;
        }

        .login-card .options input[type="checkbox"] {
            margin-right: 5px;
        }

        .login-card .register-link {
            margin-top: 20px;
            font-size: 14px;
            color: #a0a0a0;
        }

        .login-card .register-link a {
            color: #00d1ff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-card .register-link a:hover {
            color: #00aaff;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3>Login</h3>

        <?php if (isset($error)) : ?>
            <p>Username / Password Salah</p>
        <?php endif; ?>

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

            <div class="options">
                <label>
                    <input type="checkbox" name="show-password" id="show-password">
                    Show Password
                </label>
                <label>
                    <input type="checkbox" name="remember-me">
                    Remember Me
                </label>
            </div>

            <button type="submit" name="login">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

    <script>
        // Show/Hide Pass
        document.getElementById('show-password').addEventListener('change', function () {
            var passwordInput = document.getElementById('password');
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>
</html
>
