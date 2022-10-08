<?php
/*
cp1.awardspace.net: 3p?niEpMVff_KWf
---
phpMyAdmin: https://supportindeed.com/phpMyAdmin4/
user name: 4109596_dung
database name: 4109596_dung
Pass: 123456789qet
Host/Server: fdb32.awardspace.net 
*/

// echo '<p>Hello 2</p>';

//My SQLi

$servername = "fdb32.awardspace.net";
$username = "4109596_dung";
$databasename = "4109596_dung";
$password = "123456789qet";

//create a connection
$conn = new mysqli($servername, $username, $password, $databasename);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    error_log("Connected");
}
?>