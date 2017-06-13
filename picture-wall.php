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
  // Check login
  // session_start();
  // if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

  // } else {
  //     echo "<script>
  //     alert('뉴스피드를 보시려면 로그인이 필요합니다.');
  //     window.location.href='login.html';
  //     </script>";
  // }

	$hostname = "www.moonpark.biz"; // Variables loosely typed
	$username = "wildcamp"; // Default by XAMPP
	$password = "Wildcamp1234!";
	$driverOptions = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	// Column names for database
	DEFINE('DB_USER_NAME', 'poster');
	DEFINE('DB_DESCRIPTION', 'description');
	DEFINE('DB_PHOTO_URL', 'photo_uri');
	DEFINE('DB_DATETIME', 'date_stamp');
	DEFINE('DB_LIKES', 'like_count');

	$db = new PDO('mysql:host=www.moonpark.biz;dbname=wildcamp;charset=utf8mb4', $username, $password, $driverOptions);
	$stmt = $db->query('SELECT * FROM POST ORDER BY post_id DESC');

	$rows = $stmt->fetchAll();
?>

<script type="text/javascript">

</script>

<body>

  <!-- NAVBAR ================================================== (시작)-->
  <!--<div class="navbar-wrapper" style="margin-top: 0px;">
    <div class="container" style="padding: 0px; width: 100%;">-->

  <div class="navbar-wrapper" >
    <div class="container">

      <nav class="navbar navbar-default navbar-static-top"  style="max-width: 100%">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html" style="padding-top: 10px;">
              <img alt="Brand" src="resources/images/index/logo.png" style="width:70px">
            </a>
          </div>
          <!-- ===========================(각 해당파트에 active 지정해주세요)-->
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active" style="font-weight:bold"><a href="picture-wall.php">뉴스피드</a></li>
              <li><a href="animal-profile.php">Y생태계</a></li>
              <li><a href="mapChat.html">Y지도</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 회원서비스</a>
                <ul class="dropdown-menu">
                  <li><a href="login.html">로그인</a></li>
                  <li><a href="signup.html">회원가입</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    </div>
  </div>
<!-- NAVBAR ======================================================== (끝)-->

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

    <!-- Footer ================================================== (시작)-->
    <hr>
    <footer>
      <p class="pull-right"><a href="#"><span class="glyphicon glyphicon-arrow-up"></span></a></p>
      <p>&copy; 2017 Team WILDCAMP (13조) &middot; <a href="login.html">로그인</a> &middot; <a href="signup.html">가입하기</a>
      </br>본 사이트는 2017-1 인터넷 프로그래밍 팀 프로젝트의 일환으로 만들어졌습니다.</p>

    </footer>
    <!-- Footer ================================================== (끝)-->

	</div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>