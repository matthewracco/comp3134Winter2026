<?php
$conn = new mysqli("localhost", "root", "", "my_schema");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = "";

if (isset($_GET['firstname'])) {
    $search = $_GET['firstname'];
}

$result = null;

if ($search != "") {
    $sql = "SELECT * FROM users 
            WHERE firstname = '$search' 
            AND active = 1";

    $result = $conn->query($sql);
}
?>

<form method="GET">
    <input type="text" name="firstname">
    <button type="submit">Search</button>
</form>

<br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Active</th>
    </tr>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['active']}</td>
                  </tr>";
        }
    }
    ?>
</table>
