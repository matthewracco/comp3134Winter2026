<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "host" && $password === "pass") {
        $message = "Login successful!";
    } else {
        $message = "Login failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSRF</title>
</head>
<body>

<h2>Login Form</h2>

<form method="POST" action="csfr.php">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>

<div>
    <?php
        if ($message !== "") {
            echo $message;
        }
    ?>
</div>

</body>
</html>
