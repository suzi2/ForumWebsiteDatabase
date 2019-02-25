
<html>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fourm";
	
	
	$comment = $_POST["comment"];
	echo "Your comment is: ".$comment;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
$sql = "INSERT INTO topic1(comment) VALUES ('$comment')";

if ($conn->query($sql) === TRUE) {
    echo "\n New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
?>
</body>
</html>