<?php
	$user_id = $_POST['id'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$phone_no = $_POST['phone'];

	$servername = "www.moonpark.biz";
	$username = "wildcamp";
	$password = "Wildcamp1234!";
	$dbname = "wildcamp";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql = "INSERT INTO USER (user_id, password, name, phone_no)
	    VALUES (('$user_id'), ('$password'), ('$name'), ('$phone_no'))";
	    // use exec() because no results are returned
	    $conn->exec($sql);

	    echo "New user created successfully.";

    	session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

	    header("Location: http://$servername/wildcamp/picture-wall.php");

	    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

	$conn = null;
	
?>