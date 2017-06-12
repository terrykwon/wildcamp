<div class="row new-item" style="background-color: #3956CC;">
  <div class="col-sm-8 less-padding">
    <div class="container-card post">
      <div class="post-header">
        <img class="img-circle" src="resources/images/picture-wall/cat-01.jpg">
        <h3 class><?php echo $recentPost[$poster];?></h3>
        <h4 class><?php echo $recentPost[$date_stamp];?></h4>
      </div>
      <div class="post-desc">
        <p><?php echo $recentPost[$date_stamp]; ?></p>
      </div>
      <div class="post-img">
        <img class="img-responsive img-rounded" src=<?php echo $recentPost[$photo_uri];?>>
        <!-- <img class=\"img-responsive img_rounded\" -->
      </div>
      <div class="post-footer">
        <p><?php echo $recentPost[$like_count];?> likes</p>
      </div>
    </div>
  </div>
</div>
