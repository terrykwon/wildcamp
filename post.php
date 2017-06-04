<!-- Post -->
<div class="row new-item">
	<div class="col-sm-8 less-padding">
		<div class="container-card post">
			<div class="post-header">
				<img class="img-circle" src="resources/images/picture-wall/cat-01.jpg">
				<h3 class><?php echo $row[DB_USER_NAME];?></h3>
				<h4 class><?php echo $row[DB_DATETIME];?></h4>
			</div>
			<div class="post-desc">
				<p><?php echo $row[DB_DESCRIPTION]; ?></p>
			</div>
			<div class="post-img">
				<img class="img-responsive img-rounded" src=<?php echo $row[DB_PHOTO_URL];?>>
				<!-- <img class="img-responsive img_rounded" -->
			</div>
			<div class="post-footer">
				<p><?php echo $row[DB_LIKES];?> likes</p>
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
            data: '{"url": "<?php echo $row[DB_PHOTO_URL];?>"}',
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