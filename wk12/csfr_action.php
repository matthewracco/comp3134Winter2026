<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $session_token = $_SESSION["confirmation"] ?? "";

    $post_token = $_POST["confirmation"] ?? "";

    if ($session_token !== "" && $session_token === $post_token) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === "host" && $password === "pass") {
            $message = "Login successful!";
        } else {
            $message = "Login failed!";
        }

    } else {
        $message = "CSRF validation failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSRF Protected</title>
</head>
<body>

<h2>Secure Login</h2>

<div>
    <?php echo $message; ?>
</div>

</body>
</html>
