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

    <title>Photo Wall</title>

    <!-- Bootstrap core CSS -->
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="resources/css/picture-wall.css" rel="stylesheet" type="text/css">

</head>

<?php
	$hostname = "localhost"; // Variables loosely typed
	$username = "root"; // Default by XAMPP
	$password = "";
	$driverOptions = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	// Column names for database
	DEFINE('DB_USER_NAME', 'user_id');
	DEFINE('DB_DESCRIPTION', 'description');
	DEFINE('DB_PHOTO_URL', 'photo_url');
	DEFINE('DB_DATETIME', 'datetime');
	DEFINE('DB_LIKES', 'likes');

	$db = new PDO('mysql:host=localhost;dbname=wild_camp;charset=utf8mb4', $username, $password, $driverOptions);
	$stmt = $db->query('SELECT * FROM post');
	$row1 = $stmt->fetch();
?>

<body>

	<div class="container main">
		<div class="row new-item">
			<div class="col-md-8 less-padding">
				<div class="container-card post">
					<div class="post-header">
						<img class="img-circle" src="resources/images/cat-01.jpg">
						<h3 class><?php echo $row1[DB_USER_NAME];?></h3>
						<h4 class><?php echo $row1[DB_DATETIME];?></h4>
					</div>
					<div class="post-desc">
						<p><?php echo $row1[DB_DESCRIPTION]; ?></p>
					</div>
					<div class="post-img">
						<img class="img-responsive img-rounded" src=<?php echo $row1[DB_PHOTO_URL];?>>
						<!-- <img class="img-responsive img_rounded" -->
					</div>
					<div class="post-footer">
						<p><?php echo $row1[DB_LIKES];?> likes</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 less-padding">
				<div class="container-card supplement">
					<h2>인공지능 사진 인식</h2>
					<div class="horizontal-divider"></div>
					<h6>비슷한 사진들을 기반으로 이 사진의 내용을 추출한 결과입니다.</h6>
					<div class="recog-result-desc">
						<h5>"This is a cat laying on the grass."</h5>
					</div>
					<h3>Tags</h3>
					<div class="horizontal-divider"></div>
					<ol>
						<li>Cat</li>
						<li>Grass</li>
						<li>Nature</li>
					</ol>
				</div>
			</div>
		</div>

		<!-- Repeat -->
		<div class="row new-item">
			<div class="col-md-8 less-padding">
				<div class="container-card post">
					<div class="post-header">
						<img class="img-circle" src="resources/images/cat-01.jpg">
						<h3 class>홍길동</h3>
						<h4 class>04:06 PM</h4>
					</div>
					<div class="post-desc">
						<p> 오늘 아침에 발견한 고양이</p>
					</div>
					<div class="post-img">
						<img class="img-responsive img-rounded" src="resources/images/cat-01.jpg">
					</div>
					<div class="post-footer">
						<p>3 likes</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 less-padding">
				<div class="container-card supplement">
					<h2>인공지능 사진 인식</h2>
					<div class="horizontal-divider"></div>
					<h6>비슷한 사진들을 기반으로 이 사진의 내용을 추출한 결과입니다.</h6>
					<div class="recog-result-desc">
						<h5>"This is a cat laying on the grass."</h5>
					</div>
					<h3>Tags</h3>
					<div class="horizontal-divider"></div>
					<ol>
						<li>Cat</li>
						<li>Grass</li>
						<li>Nature</li>
					</ol>
				</div>
			</div>
		</div>


	</div>
</body>
</html>