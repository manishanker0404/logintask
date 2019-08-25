<html>
<head>
 <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "";
	$mysql_database = "userdata";
	$name = $_POST["name"] ;
	$email = $_POST["email"];
	if (empty($name)){
		die("Please enter your Name");
	}
	if (empty($email)){
		die("Please enter valid email address");
	}
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}	
	
	$statement = $mysqli->prepare("INSERT INTO users_data1 ( name,  email ) VALUES( ?, ?)"); 
	$statement->bind_param('ss', $name, $email ); 
	
	if($statement->execute()){
		print "Hello " . $name . "!, Entered successfully!";
	}else{
		print $mysqli->error; 
	}
}
 ?>
 </head>
</html>