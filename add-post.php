<?php
    // Check login
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    } else {
        echo "<script>
        alert('사진 업로드를 하시려면 로그인이 필요합니다.');
        window.location.href='login.html';
        </script>";
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $description = $_POST["description"];
    $species = $_POST["species"];
    $animal_id =  $_POST["animal_id"];

    $loc = explode(',', $_POST["location"]);
    $lat = $loc[0];
    $lon = $loc[1];
?>

<?php
    $servername = "www.moonpark.biz";
    $username = "wildcamp";
    $password = "Wildcamp1234!";
    $dbname = "wildcamp";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO POST (poster, photo_uri, description, animal_id, date_stamp, like_count, species, caption, tag1, tag2, tag3)
        VALUES ('user', ('$target_file'), ('$description'), ('$animal_id'), now(), 0, ('$species'), 'caption', 'tag1', 'tag2', 'tag3')";
        // use exec() because no results are returned
        $conn->exec($sql);

        $sql2 = "INSERT INTO ANIMAL (last_lat, last_lon, rep_photo, nickname, popularity, species)
        VALUES (('$lat'), ('$lon'), ('$target_file'), 'nickname', 0, ('$species'))";
        $conn->exec($sql2);

        echo "New record created successfully";

        header("Location: http://$servername/wildcamp/picture-wall.php");

        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;
?>

<html>
<body>

</body>
</html>
