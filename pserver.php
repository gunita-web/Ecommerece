<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "app";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['reg_p'])) {
	
  	// Get image name
  	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);

// receive all input values from the form

$pname = mysqli_real_escape_string($conn,$_POST['pname']);

$price = mysqli_real_escape_string($conn,$_POST['price']);

$pcat = mysqli_real_escape_string($conn,$_POST['pcat']);

$pdetails = mysqli_real_escape_string($conn,$_POST['pdetails']);

//$upload = mysqli_real_escape_string($conn,$_POST['upload']);


// Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

$sql = "INSERT INTO products (name,code,price,image,product_details)

VALUES ('$pname','$pcat','$price','$image','$pdetails')";


if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  
  $result = mysqli_query($dbname, "SELECT * FROM images");


if ($conn->query($sql) === TRUE) {

echo "alert('New record created successfully')";

} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}

}

$conn->close();

?>