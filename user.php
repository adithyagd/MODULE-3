<? php
$username = " localhost";
$password = " 123456";
$dbname = "student";
// create connection
$conn = new mysqli($servername ,$username ,$password , $dbname ) ;
// check the connection
if ( $conn->connect_error) {
    die("connection falied: " . $conn->connect_error);
}
echo " connection successfully!";
$conn->close();
?>