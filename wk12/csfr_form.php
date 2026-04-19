<?php
session_start();

$_SESSION["confirmation"] = bin2hex(random_bytes(16));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Form</title>
</head>
<body>

<h2>Secure Login Form</h2>

<form method="POST" action="csfr_action.php">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>

    <input type="hidden" name="confirmation" value="<?php echo $_SESSION["confirmation"]; ?>">

    <button type="submit">Login</button>
</form>

</body>
</html>
