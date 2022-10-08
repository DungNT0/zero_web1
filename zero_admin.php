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

//get data
$sql = "SELECT * FROM clothes";
$result = $conn->query($sql);

// $myArray = array();
// error_log("get-employees::Num rows: " . $result->num_rows);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $row['delete'] = '<button style="padding-top: 4px;" class="btn btn-danger" value="' . $row['id'] . '">Delete</button>';

        $myArray[] = $row;
    }

    // output our array as json
    echo json_encode(array('data' => $myArray));

} else {
    error_log('get-product::zero results');
}

// finished so close the db connection
$conn->close();
?>