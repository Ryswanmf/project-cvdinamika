<?php
$mysqli = new mysqli('127.0.0.1','root','','cv_dinamika',3306);
if ($mysqli->connect_errno) {
    echo "CONN_ERR: " . $mysqli->connect_error . PHP_EOL;
    exit(1);
}
$password = 'password';
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE username = ?");
$username = 'admin';
$stmt->bind_param('ss', $hash, $username);
if (!$stmt->execute()) {
    echo "UPDATE_ERR: " . $stmt->error . PHP_EOL;
    exit(1);
}
if ($stmt->affected_rows === 0) {
    // Try insert if no row updated
    $stmt2 = $mysqli->prepare("INSERT INTO users (username,password,name,created_at,updated_at) VALUES (?,?,?,?,?)");
    $now = date('Y-m-d H:i:s');
    $stmt2->bind_param('sssss', $u='admin', $hash, $name='Administrator', $now, $now);
    if (!$stmt2->execute()) {
        echo "INSERT_ERR: " . $stmt2->error . PHP_EOL;
        exit(1);
    }
    echo "Inserted admin user with password 'password'.\n";
} else {
    echo "Updated admin password to 'password'.\n";
}
$mysqli->close();
