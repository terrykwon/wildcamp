<?php
    $myusername=$_POST['id']; 
    $mypassword=$_POST['password'];

    echo($myusername);
    echo($mypassword);


    $hostname = "www.moonpark.biz"; // Variables loosely typed
    $username = "wildcamp"; // Default by XAMPP
    $password = "Wildcamp1234!";
    $driverOptions = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $db = new PDO('mysql:host=www.moonpark.biz;dbname=wildcamp;charset=utf8mb4', $username, $password, $driverOptions);
        $sql = "SELECT * FROM USER";
        $stmt = $db->query($sql);
        $rows = $stmt->fetchAll();

     
        // $sql="SELECT user_id FROM USER WHERE name='$myusername' and password='$mypassword'";
        // $result=mysql_query($sql);
     
        $count=sizeof($rows);
        echo($count);
        $loggedin = false;

        foreach($rows as $row) {
            echo($row['user_id']." ".$row['password']);

            if ($row['user_id'] == $myusername && $row['password'] == $mypassword) {
                
                $loggedin = true;
                break;
            }
        }
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $db = null;

    if ($loggedin) {
        echo("logged in");
        // header("Location: http://$servername/wildcamp/picture-wall.php");

        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $myusername;

        header("Location: picture-wall.php");

    } else {
        echo("not logged in");
    }

?>