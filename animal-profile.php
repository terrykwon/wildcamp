<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="content-type" content="text/html; charset=utf-8" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="animal profile" />
    <meta name="keywords" content="wildcamp wild camp animalprofile" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="resources/images/animal-profile/wildcamplogo.png" />
    <link rel="stylesheet" href="resources/css/apstyle.css">
    <link rel="stylesheet" href="resources/css/picture-wall.css">
    <link rel="icon" href="resources/images/index/icon.png">
    <title>wildCamp 동물 프로필</title>
    <!--special character, &  -->
    <!-- embedded style sheet 적용 -->
    <style>
    body {
      font-size: 1em;
      -webkit-text-size-adjust: 100%;
      font-family : "Nanum Gothic", sans-serif;
      text-align: center;
      /*background-color: rgba(253, 243, 226, 1);*/
      /*background-color: rgba(25, 56, 64, 1);*/
      background-color: lightgrey;
      /*background-color: black;*/

    }
    </style>
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <?php

    	$hostname = "www.moonpark.biz"; // Variables loosely typed
    	$username = "wildcamp"; // Default by XAMPP
    	$password = "Wildcamp1234!";
      $dbname = "wildcamp";
    	$driverOptions = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

      //$con = mysql_connect("localhost",$username,$password);
      //mysql_select_db($dbname, $con);
      //mysql_query("set session character_set_client=euckr");
      //mysql_query("set session character_set_connection=euckr");
			//mysql_query("set session character_set_results=euckr");

    	// Column names for database
    	DEFINE('DB_USER_NAME', 'poster');
    	DEFINE('DB_DESCRIPTION', 'description');
    	DEFINE('DB_PHOTO_URL', 'photo_uri');
    	DEFINE('DB_DATETIME', 'date_stamp');
    	DEFINE('DB_LIKES', 'like_count');

      $poster = "poster";
      $description = "description";
      $photo_uri = "photo_uri";
      $date_stamp = "date_stamp";
      $like_count = "like_count";
////////////////////////////////////아래의 localhost를 www.moonpark.biz로 변경
    	$db = new PDO('mysql:host=www.moonpark.biz;dbname=wildcamp;charset=utf8mb4', $username, $password, $driverOptions);
      ///*******************************
      $_POST["AID"] = 1;   /// 실제로 올릴때는 이 부분 주석처리 할것!
      //**********************************************//
      $AID = $_POST["AID"];
      $sql = "SELECT * FROM ANIMAL where AID= $AID";
      $stmt = $db->query($sql);
      $result = $stmt->fetch();   // 하나의 행만 가져온다. AID는 고유값이므로 무방.
      // print_r($result);

      $sql2 = "SELECT * FROM POST where animal_id = $AID order by date_stamp limit 3";  // 가장 최근 포스트 3개만 가져온다.
      $stmt2 = $db->query($sql2);
      $result2 = $stmt2->fetchAll();
      // print_r($result2);
      ?>



    <?php
      // echo "$result[nickname]";   // wisoo'



     ?>



    <div class="navbar-wrapper" style="margin-top: 0px;">
      <div class="container">

        <nav class="navbar navbar-default navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="./index.html">
                <img alt="Brand" src="resources/images/index/logo.png" style="width:70px">
              </a>
            </div>
            <!-- ===========================(각 해당파트에 active 지정해주세요)-->
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li style="font-weight:bold"><a href="picture-wall.php">뉴스피드</a></li>
                <li class="active"><a href="animal-profile.php">Y생태계</a></li>
                <li><a href="mapChat.html">Y지도</a></li>
                <li><a href="animalencyclopedia.html">동물백과사전</a></li>
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

    <header>
      <div class="headerBar">

        <!--<div class="containerC">-->
          <!--h1 태그 사용! 실제로 들어가는 텍스트 내용은 없으나, functionality를 고려.  -->
          <!--<h1 class="logo" style="float: left;"><a href="#"><img class="burger" src="resources/images/animal-profile/burger2.png" alt="burger" title="burger"  /></a></h1>-->
          <!--logo에 inline css 적용  -->
          <!-- 아래부터 네비게이션 태그!! -->
        </div>
      </div>
      <!-- end of headerBar` -->
    </header>
      <!--  -->
      <div class="row">
        <div class="leftbox">
          <div class=".CatPic">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
              <div class="thumbnail" style="margin-bottom: 10px;">
                <img src=<?php echo"\"";print_r($result2[0][$photo_uri]);echo"\""?> class="img-responsive" alt="Responsive image" style="height:400px">
                <div class="caption"><h1></h1><h1 id="popCount" style="color: red;"><?php
                $totalLikes = 0;
                foreach($result2 as $recentPost){
          // print_r($recentPost);
                $totalLikes += $recentPost["like_count"];
              }
                 echo "♥ ";
                 echo "$totalLikes";
                 ?></h1>
                  <p><a href="#GMapHolder" id="tracking" class="btn btn-primary" role="button" style="background-color: #3956CC;
                  border-color: #587F69;">트래킹!</a> <h5 id="pop" class="btn btn-default" role="button">인기도++</h5></p>
                  <script type="text/javascript">
                    // var count =0;
                    document.getElementById("pop").addEventListener("click", function(){
                            // count++;
                            document.getElementById("popCount").innerHTML = parseInt(document.getElementById("popCount").innerHTML.split(" ")[1]) +1;
                            document.getElementById("popCount").innerHTML = "♥ "+document.getElementById("popCount").innerHTML;

                            // var cJson = {"count" : count;};
                            // var xmlhttp = new XMLHttpRequest(); // 새로은 XMLHTTP 객체를 생성.
                            // xmlhttp.open("POST", "/temp.php");
                            // xmlhttp.setRequestHeader("Content-Type", "application/json");
                            // xmlhttp.send(JSON.stringify(cJson));
                            //
                            });
                  </script>

                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!--<div class="panel" style="margin-left: 10px; margin-right: 10px;">
                <div class="panel-heading" style="color:#3956CC; background-color:#A8F4C9;">별명</div>
                <div class="panel-footer" style="text-align: center;">
                  <h6>야옹이</h6>
                </div>-->
                <div class="panel" style="margin-left: 10px; margin-right: 10px;">
                  <div class="panel-heading" style="background-color:#4ec682; color:white;">별명</div>
                  <div class="panel-footer" style="text-align: center;">
                    <h6><?php echo "$result[nickname]";?></h6>
                  </div>
              </div>


              <div class="panel" style="margin-left: 10px; margin-top: 30px; margin-right: 10px;">
                <div class="panel-heading" style="background-color:#348457; color:white;">종</div>
                <div class="panel-footer" style="text-align: center;">
                  <h6><?php echo "<a href=\"./animalencyclopedia.html#$result[6]\">$result[6]</a>"; ?></h6>
                </div>
              </div>

              <div class="panel" style="margin-left: 10px;margin-right: 10px;">
                <div class="panel-heading" style="background-color:#286945; color:white;">설명</div>
                <div class="panel-footer" style="text-align: center; height: 90px;">
                    <h6><?php print_r($result2[0][$description]);?></h6>
                </div>
              </div>
            </div>
        </div>
    </div>

          <div class="col-lg-2"></div>
          <div class="col-lg-8">
              <hr class="featurette-divider">
          </div>
          <div class="col-lg-2"></div>

  </div>
      <!--  -->
      <!--  -->
      <!-- <div class="row new-item"> -->
      <div class="container" style="background-color: #beige; position: center;">

        <h4>최근 게시물</h4>
        <?php

        foreach($result2 as $recentPost){
  // print_r($recentPost);


        include "subpost.php";
        }

    ?>
      </div> <!--end of content2-->
    </div>
<data hidden id="animalLon"><?php echo "$result[1]" ?></data>
<data hidden id="animalLat"><?php echo "$result[2]" ?></data>
<data hidden id="species"><?php echo "$result[6]" ?></data>
<data hidden id="nickname"><?php echo"$result[4]" ?></data>
<data hidden>
  <div class="category">
      <ul>
          <li id="catMenu" onclick="changeMarker('cat')">
              <span class="ico_comm ico_coffee"></span>
              고양이
          </li>
          <li id="chipmunkMenu" onclick="changeMarker('store')">
              <span class="ico_comm ico_store"></span>
              다람쥐
          </li>
          <li id="magpieMenu" onclick="changeMarker('carpark')">
              <span class="ico_comm ico_carpark"></span>
              까치
          </li>
      </ul>
  </div>
</data>

    <article class="ar">
    <div class="Information">

      <div id="GMapHolder">

        <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=cfc5f98af61280c2e1d48a04779bc95a"></script>
        <script>
        var animalLon = parseFloat(document.getElementById("animalLon").innerHTML);
        var animalLat = parseFloat(document.getElementById("animalLat").innerHTML);
        var animalSpecies = document.getElementById("species").innerHTML;
        var animalNick = document.getElementById("nickname").innerHTML;
        // alert(animalLat);  // 정상작동
        // alert(animalLon);  // 정상작동
        var mapContainer = document.getElementById('GMapHolder'),
        mapOption = {
                // center: new daum.maps.LatLng(37.563799, 126.937749),
                center: new daum.maps.LatLng(animalLat, animalLon),
                level: 3
            };

        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function(position) {

              lat = position.coords.latitude;
              lon = position.coords.longitude;

                var locPosition = new daum.maps.LatLng(lat, lon),
                    message = '<div style="padding:5px;">나는 지금 여기!</div>';
                displayMarker(locPosition, message);

              });

        } else {

            var locPosition = new daum.maps.LatLng(37.565757, 126.938541),
                message = '위치를 확인할 수 없어요..:('

            displayMarker(locPosition, message);
        }
        var avgLat = (animalLat + lat) /2;
        var avgLon = (animalLon + lon) /2;
        // mapOption.center = new daum.maps.LatLng(avgLat, avgLon);
        var map = new daum.maps.Map(mapContainer, mapOption);
        var catPositions = [
            new daum.maps.LatLng(animalLat,animalLon)
        ];

        var chipmunkPositions = [
            new daum.maps.LatLng(animalLat, animalLon)
        ];

      var magpiePositions = [
            new daum.maps.LatLng(animalLat, animalLon)
        ];

        var markerImageSrc = 'resources\\images\\mapChat\\category.png';
            catMarkers = [],
            chipmunkMarkers = [],
            magpieMarkers = [];

        createcatMarkers();
        createchipmunkMarkers();
        createmagpieMarkers();
        if(animalSpecies == 'cat' || animalSpecies == '고양이' || animalSpecies == 'Cat'){
          changeMarker('cat');
        }else if (animalSpecies =='chipmunk' || animalSpecies =='다람쥐' || animalSpecies == 'squirrel' || animalSpecies=='Chipmunk' || animalSpecies=='Squirrel') {
          changeMarker('chipmunk');
        }else if(animalSpecies == 'magpie' || animalSpecies == '까치' || animalSpecies == 'Magpie'){
          changeMarker('magpie');
        }


        function createMarkerImage(src, size, options) {
            var markerImage = new daum.maps.MarkerImage(src, size, options);
            return markerImage;
        }


        function createMarker(position, image) {
            var marker = new daum.maps.Marker({
                position: position,
                image: image
            });

            return marker;
        }

        function createcatMarkers() {

            for (var i = 0; i < catPositions.length; i++) {

                var imageSize = new daum.maps.Size(22, 26),
                    imageOptions = {
                        spriteOrigin: new daum.maps.Point(10, 0),
                        spriteSize: new daum.maps.Size(36, 98)
                    };


                var markerImage = createMarkerImage(markerImageSrc, imageSize, imageOptions),
                    marker = createMarker(catPositions[i], markerImage);

                catMarkers.push(marker);
            }
        }


        function setcatMarkers(map) {
            for (var i = 0; i < catMarkers.length; i++) {
                catMarkers[i].setMap(map);
            }
        }


        function createchipmunkMarkers() {
            for (var i = 0; i < chipmunkPositions.length; i++) {

                var imageSize = new daum.maps.Size(22, 26),
                    imageOptions = {
                        spriteOrigin: new daum.maps.Point(10, 36),
                        spriteSize: new daum.maps.Size(38, 98)
                    };


                var markerImage = createMarkerImage(markerImageSrc, imageSize, imageOptions),
                    marker = createMarker(chipmunkPositions[i], markerImage);


                chipmunkMarkers.push(marker);
            }
        }


        function setchipmunkMarkers(map) {
            for (var i = 0; i < chipmunkMarkers.length; i++) {
                chipmunkMarkers[i].setMap(map);
            }
        }


        function createmagpieMarkers() {
            for (var i = 0; i < magpiePositions.length; i++) {

                var imageSize = new daum.maps.Size(22, 26),
                    imageOptions = {
                        spriteOrigin: new daum.maps.Point(10, 72),
                        spriteSize: new daum.maps.Size(36, 98)
                    };


                var markerImage = createMarkerImage(markerImageSrc, imageSize, imageOptions),
                    marker = createMarker(magpiePositions[i], markerImage);


                magpieMarkers.push(marker);
            }
        }

        function setmagpieMarkers(map) {
            for (var i = 0; i < magpieMarkers.length; i++) {
                magpieMarkers[i].setMap(map);
            }
        }

        function changeMarker(type){

            var catMenu = document.getElementById('catMenu');
            var chipmunkMenu = document.getElementById('chipmunkMenu');
            var magpieMenu = document.getElementById('magpieMenu');


            if (type === 'cat') {


                catMenu.className = 'menu_selected';


                chipmunkMenu.className = '';
                magpieMenu.className = '';

                setcatMarkers(map);
                setchipmunkMarkers(null);
                setmagpieMarkers(null);

            } else if (type === 'store') {

                catMenu.className = '';
                chipmunkMenu.className = 'menu_selected';
                magpieMenu.className = '';

                setcatMarkers(null);
                setchipmunkMarkers(map);
                setmagpieMarkers(null);

            } else if (type === 'carpark') {


                catMenu.className = '';
                chipmunkMenu.className = '';
                magpieMenu.className = 'menu_selected';

                setcatMarkers(null);
                setchipmunkMarkers(null);
                setmagpieMarkers(map);
            }
        }
        var lat;
        var lon;
        // HTML5의 geolocation으로 사용할 수 있는지 확인합니다

        displayMarker(new daum.maps.LatLng(animalLat, animalLon), animalNick+"의 최근 위치!");
        function displayMarker(locPosition, message) {


            var marker = new daum.maps.Marker({
                map: map,
                position: locPosition
            });

            var iwContent = message,
                iwRemoveable = true;


            var infowindow = new daum.maps.InfoWindow({
                content : iwContent,
                removable : iwRemoveable
            });


            infowindow.open(map, marker);


        }
        </script>


      <!-- </div>
      <div class="explain">
        <div  class="mainT">
          <p>
            <h3 id="recentL">최근 발견위치</h3>
          </p>
        </div> -->
      </div>
    </div>
    <!--End of Information  -->
    </article>

      <div class="footer">
           <!--팀정보를 표시  -->
  			<div class="row">
  				<p><h6>Team WildCamp<h6>

          </p>

  			</div>
  		</div>
  </body>
</html>
