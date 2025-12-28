<?php
$mysqli = new mysqli('127.0.0.1','root','','cv_dinamika',3306);
if ($mysqli->connect_errno) {
    echo "CONN_ERR: " . $mysqli->connect_error . PHP_EOL;
    exit(1);
}
$res = $mysqli->query("SELECT id,username,password,name FROM users LIMIT 50");
if (!$res) {
    echo "QUERY_ERR: " . $mysqli->error . PHP_EOL;
    exit(1);
}
while ($row = $res->fetch_assoc()) {
    echo $row['id'] . "\t" . $row['username'] . "\t" . $row['password'] . "\t" . $row['name'] . PHP_EOL;
}
$mysqli->close();
