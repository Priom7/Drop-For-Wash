<?php 
include'header.php';
?>

		        
        <!-- Topic Area Start -->
        <div id="topic">
            <div class="container">
                <div class="row">
                    <!-- Topic Items Start -->
                    <div class="col-md-9 topic--body">
						<!-- Topic Breadcrumb Start -->
<div class="topic--breadcrumb clearfix">
	<ol class="breadcrumb">
		<li><i class="fa fa-home"></i></li>
						<li class="active"><?php $site= $app->SiteDetails(); echo $site->site_name; ?></li>
			</ol>
	<button type="button" class="toggle-sidebar"><i class="fa fa-reorder"></i></button>
</div>
<!-- Topic Breadcrumb End -->						
						
							
<div class="topic--list">
<div class="topic-list--header clearfix">
<a href="./viewforum.php?f=1" class="topic-list-header--title"><i class="fa fa-file-text-o"></i>Main</a>
<span class="topic-list-header--toggle-btn"><i class="fa fa-minus"></i></span>
</div>
<div class="topic-list--content">
<ul>
<?php
$conn=DB();
$getTopic = $conn->prepare("SELECT topic_id,topic_name,description,users.username,topic.date FROM `topic` INNER JOIN users ON topic.user_id=users.user_id");
$getTopic->execute();
$topcidata = $getTopic->fetchAll();
foreach ($topcidata as $data) {
		$topicID=$data['0'];
		$topicname=$data['1'];
		$description=$data['2'];
		$username=$data['3'];
		$date=$data['4'];


			$getreplaycount = $conn->prepare("SELECT COUNT(idea_id) FROM `idea` WHERE topic_id=$topicID");
			$getreplaycount->execute();
			$replay = $getreplaycount->fetchAll();
			foreach ($replay as $data) {
					$totalIdea=$data['0'];
					
			}

echo'<li class="">
	<div class="topic-list-content--title">
	<h2><a href="./viewforum.php?t='.$topicID.'">'.$topicname.'</a></h2>
	<p>'.$description.'</p>
	</div>
	<div class="topic-list-content--meta">
	<span class="recent-post-time">by <a href="./memberlist.php?mode=viewprofile&amp;u=2" style="color: #AA0000;" class="username-coloured">'.$username.'</a> '.$date.'</span>
				</div>

	<div class="topic-list-content--stats">
	<p><strong>'.$totalIdea.'</strong>Ideas</p>
	</div>
	</li>';
}

?> 

</ul>
</div>
</div>
</div>
  <!-- Topic Items End -->
                 
                  <?php  include'sidebar.php';?>
                </div>
            </div>
        </div>
        <!-- Topic Area End -->
<?php 
include'footer.php';
?>