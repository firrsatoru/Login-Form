<?php
require "../service/database.php";

function register($data) {

    global $conn;


    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user_account WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert('Username Sudah Terpakai');
            </script>
        ";

        return false;
    }

    if ( $password !== $password2 ) {
        echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai');
            </script>
        ";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user_account VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

?>
