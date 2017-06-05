<!DOCTYPE html>

<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <!-- Disable caching for dev -->
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>Photo Wall</title>

    <!-- Bootstrap core CSS -->
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="resources/css/picture-wall.css" rel="stylesheet" type="text/css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

</head>

<?php
	$hostname = "localhost"; // Variables loosely typed
	$username = "root"; // Default by XAMPP
	$password = "";
	$driverOptions = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	// Column names for database
	DEFINE('DB_USER_NAME', 'poster');
	DEFINE('DB_DESCRIPTION', 'description');
	DEFINE('DB_PHOTO_URL', 'photo_uri');
	DEFINE('DB_DATETIME', 'date_stamp');
	DEFINE('DB_LIKES', 'like_count');

	$db = new PDO('mysql:host=localhost;dbname=wildcamp;charset=utf8mb4', $username, $password, $driverOptions);
	$stmt = $db->query('SELECT * FROM post ORDER BY post_id DESC');

	$rows = $stmt->fetchAll();
?>

<script type="text/javascript">
    document.getElementById("upload").onclick = function () {
        location.href = "http://localhost/wildcamp/add-post.html";
    };
</script>

<body>

	<div class="container main">

		<!-- Upload photo -->
		<div class="row new-item">
			<div class="col-sm-8 less-padding">
				<a href="add-post.html">
					<div class="container-card upload" id="upload">
						<img src="resources/images/picture-wall/ic_insert_photo_black_24px.svg" id="photo-icon">
						<div>
							<h2>사진 올리기</h2>
							<p>연세대학교에서 발견한 귀여운 동물 사진을 올려보세요!</p>
						</div>
						<img src="resources/images/picture-wall/ic_file_upload_black_24px.svg" id="upload-icon">
					</div>
				</a>
			</div>
		</div>

		<!-- Posts -->

		<?php
			foreach($rows as $row)
			include 'post.php';
		?>

	</div>
</body>
</html>