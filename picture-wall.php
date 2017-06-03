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

<script type="text/javascript">
    $(function() {
        var params = {
            // Request parameters
            "visualFeatures": "Categories,Description,Color",
            "details": "",
            "language": "en",
        };

        $.ajax({
            url: "https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/analyze?" + $.param(params),

            beforeSend: function(xhrObj){
                // Request headers
                xhrObj.setRequestHeader("Content-Type","application/json");

                // NOTE: Replace the "Ocp-Apim-Subscription-Key" value with a valid subscription key.
                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", "5bcd5f1600194ff0b245ba42eb924a99");
            },

            type: "POST",

            // Request body
            data: '{"url": "<?php echo $row1[DB_PHOTO_URL];?>"}',
        })

        .done(function(data) {
            // Show formatted JSON on webpage.
            $("#responseTextArea").val(JSON.stringify(data, null, 2));
            desc = data.description;
            // alert(desc.captions[0].text);
            $("#recog-desc").val(desc.captions[0].text);
            document.getElementById('recog-desc').innerHTML = "\"" + desc.captions[0].text + "\"";
            document.getElementById('recog-tag1').innerHTML = desc.tags[0];
            document.getElementById('recog-tag2').innerHTML = desc.tags[1];
            document.getElementById('recog-tag3').innerHTML = desc.tags[2];

        })

        .fail(function(jqXHR, textStatus, errorThrown) {
            // Display error message.
            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" : jQuery.parseJSON(jqXHR.responseText).message;
            alert(errorString);
        });
    });
</script>

	<div class="container main">

		<!-- Upload photo -->
		<div class="row new-item">
			<div class="col-sm-8 less-padding">
				<div class="container-card upload">
					<img src="resources/images/picture-wall/ic_insert_photo_black_24px.svg" id="photo-icon">
					<div>
						<h2>사진 올리기</h2>
						<p>연세대학교에서 발견한 동물 사진을 올리세요!</p>
					</div>
					<img src="resources/images/picture-wall/ic_file_upload_black_24px.svg" id="upload-icon">
				</div>
			</div>
		</div>

		<div class="row new-item">
			<div class="col-sm-8 less-padding">
				<div class="container-card post">
					<div class="post-header">
						<img class="img-circle" src="resources/images/picture-wall/cat-01.jpg">
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

			<div class="col-sm-4 less-padding">
				<div class="container-card supplement">
					<h2>인공지능 사진 인식</h2>
					<div class="horizontal-divider"></div>
					<h6>비슷한 사진들을 기반으로 이 사진의 내용을 추출한 결과입니다.</h6>
					<div class="recog-result-desc">
						<h5 id="recog-desc"></h5>
					</div>
					<h3>Tags</h3>
					<div class="horizontal-divider"></div>
					<ol>
						<li id="recog-tag1"></li>
						<li id="recog-tag2"></li>
						<li id="recog-tag3"></li>
					</ol>
				</div>
			</div>
		</div>

		<!-- Repeat -->
		<div class="row new-item">
			<div class="col-md-8 less-padding">
				<div class="container-card post">
					<div class="post-header">
						<img class="img-circle" src="resources/images/picture-wall/cat-01.jpg">
						<h3 class>홍길동</h3>
						<h4 class>04:06 PM</h4>
					</div>
					<div class="post-desc">
						<p> 오늘 아침에 발견한 고양이</p>
					</div>
					<div class="post-img">
						<img class="img-responsive img-rounded" src="resources/images/picture-wall/cat-01.jpg">
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
						<li id="tag1">Cat</li>
						<li id="tag2">Grass</li>
						<li id="tag3">Nature</li>
					</ol>
				</div>
			</div>
		</div>


	</div>
</body>
</html>