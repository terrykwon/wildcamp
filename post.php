<!-- Post -->
<div class="row new-item">
	<div class="col-sm-8 less-padding">
		<div class="container-card post">
			<div class="post-header">
				<img class="img-circle" src="resources/images/picture-wall/cat-01.jpg">
				<h3><?php echo $row[DB_USER_NAME];?></h3>
				<h4><?php echo $row[DB_DATETIME];?></h4>
			</div>
			<div class="post-desc">
				<p><?php echo $row[DB_DESCRIPTION]; ?></p>
			</div>
			<div class="post-img" id="img-<?php echo $row['post_id'];?>">
				<img class="img-responsive img-rounded" src=<?php echo $row[DB_PHOTO_URL];?>>
				<!-- <img class="img-responsive img_rounded" -->
			</div>
			<div class="post-footer">
				<p><?php echo $row[DB_LIKES];?> likes</p>
			</div>
		</div>
	</div>

	<div class="col-sm-4 less-padding">
		<div class="container-card supplement" id="ai-<?php echo $row['post_id'];?>">
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
            // data: '{"url": "<?php echo $row[DB_PHOTO_URL];?>"}',
            data: '{"url": "http://moonpark.biz/wildcamp/<?php echo $row[DB_PHOTO_URL];?>"}',
        })

        .done(function(data) {
            // Show formatted JSON on webpage.
            desc = data.description;
            $('#ai-<?php echo $row['post_id'];?>').find('#recog-desc').html("\"" + desc.captions[0].text + "\"");
            $('#ai-<?php echo $row['post_id'];?>').find('#recog-tag1').html(desc.tags[0]);
            $('#ai-<?php echo $row['post_id'];?>').find('#recog-tag2').html(desc.tags[1]);
            $('#ai-<?php echo $row['post_id'];?>').find('#recog-tag3').html(desc.tags[2]);

        })

        .fail(function(jqXHR, textStatus, errorThrown) {
            // Display error message.
            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" : jQuery.parseJSON(jqXHR.responseText).message;
            alert(errorString);
        });
    });

    $('#img-<?php echo $row['post_id'];?>').click(function() {
    	// alert('img-<?php echo $row['post_id'];?>', "clicked.");

    	// $.post("animal-profile.php", 
    	// {
    	// 	AID: <?php echo $row['animal_id'];?>
    	// }, function(data, status) {
    	// 	alert(status);
    	// 	window.location.replace("animal-profile.php");
    	// });

    	window.location = "animal-profile.php?AID=<?php echo $row['animal_id'];?>";

    });
</script>