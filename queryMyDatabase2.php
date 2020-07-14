<?php
$servername = "localhost";
$username = "";
$password = "";
$db_name = "adventureworks";

// Make a MySQL Connection
$con=mysqli_connect($servername, $username, $password, $db_name);

// check for connection error
if ($con->connect_errno) {
    echo $mysqli->connect_error;
    exit();
}

//Get data items sent from web page
$item1 = $_POST['dataItem1'];
$item2 = $_POST['dataItem2'];

//check to make sure user entered both items
if ($item1 == "" or $item2 == "")
{
	echo "Missing criteria item";
	exit;
}

// Query the desired table in the database and have it return a row if both items in the row match the input data items
$result = $con->query("SELECT * FROM contact WHERE FirstName = '$item1' AND LastName = '$item2'");

echo "Query Results</br>-----------------------------<br><br>";

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
	echo $row['ContactID']." ".$row['NameStyle']." ".$row['Title']."-".$row['FirstName']."-".$row['MiddleName']."-".$row['LastName']."-".$row['Suffix']."-".$row['EmailAddress']." ".$row['EmailPromotion']." ".$row['Phone']."-".$row['PasswordHash']."-".$row['PasswordSalt']."-".$row['AdditionalContactInfo']."-".$row['rowguid']."-".$row['ModifiedDate']."</br>";
}

echo "<br>-----------------------------<br>";

// free result set 
$result->free();

// close connection
$con->close();
?>