<?php 
include'header.php';
if (isset($_GET['t'])) { 
    $id = $_GET['t']; 
} 
else { 
    $id = null; 
} 

?>
<div id="topic">
            <div class="container">
                <div class="row">
                    <!-- Topic Items Start -->
                    <div class="col-md-9 topic--body">
						<!-- Topic Breadcrumb Start -->
<div class="topic--breadcrumb clearfix">
	<ol class="breadcrumb">
		<li><i class="fa fa-home"></i></li>
		<li><a href="./index.php"><?php $site= $app->SiteDetails(); echo $site->site_name; ?></a></li>
		<li class="active">Topic will be dynamic</li>
	</ol>
<button type="button" class="toggle-sidebar"><i class="fa fa-reorder"></i></button>
</div>
<!-- Topic Breadcrumb End -->
						
<div class="action-bar">
<div class="action-bar--pagination clearfix">
	<form method="GET" action="add-Idea.php">
		<input type="hidden" name="tId" value="<?php echo $id; ?>">
		<button type="submit" class="action-bar-pagination--new post-icon"><i class="fa fm fa-edit"></i>New Idea</button>
		<a href="add-Idea.php" class=""><i class="fa fm fa-edit"></i>New Idea</a>
	</form>

</div>
</div>
<div class="topic--list">
<div class="topic-list--header clearfix">
<span class="topic-list-header--title">
<i class="fa fa-file-text-o"></i>
Ideas
</span>
<span class="topic-list-header--toggle-btn"><i class="fa fa-minus"></i></span>
</div>
<div class="topic-list--content">
<ul>

	<?php
$conn=DB();
$getTopic = $conn->prepare("SELECT `idea_id`,`idea_title`,idea.`description`,topic.topic_name,`username`,`datetime` FROM `idea` INNER JOIN topic ON idea.topic_id=topic.topic_id WHERE topic.topic_id=$id");
$getTopic->execute();
$topcidata = $getTopic->fetchAll();
foreach ($topcidata as $data) {
	$ideaID=$data['0'];
	$ideatitle=$data['1'];
	$description=$data['2'];
	$topicname=$data['3'];
	$username=$data['4'];
	$datetime=$data['5'];

			$getreplaycount = $conn->prepare("SELECT COUNT(comment_id) FROM `comment` WHERE idea_id=$ideaID");
			$getreplaycount->execute();
			$replay = $getreplaycount->fetchAll();
			foreach ($replay as $data) {
					$totalReplay=$data['0'];
					
			}




echo'<li>
<div class="topic-list-content--title">
<h2>
<a href="./viewidea.php?ideaId='.$ideaID.'">'.$ideatitle.'</a>
</h2>
</div>

<div class="topic-list-content--meta">
<span class="recent-post-time">posted at '.$datetime.'</span>
</div>

<div class="topic-list-content--stats">
<p><strong>'.$totalReplay.'</strong>Replies</p>
</div>
</li>';
}

?> 

</ul>
</div>
</div>					
                    </div>
                    <!-- Topic Items End -->
                    <!-- Topic Sidebar Start -->
                    <div class="col-md-3 topic--sidebar">
												
												
						<!-- Topic Sidebar Widget Start -->
						<div class="topic-sidebar--widget">
							<div class="topic-list--header clearfix">
								<span class="topic-list-header--title"><i class="fa fa-bar-chart"></i>Advertisement</span>
								<span class="topic-list-header--toggle-btn"><i class="fa fa-minus"></i></span>
							</div>
							<div class="topic-list--content">
								<!-- Sidebar Ad Widget Start -->
								<div class="topic-sidebar-widget--ad">
									<a href="#" class="ad">
									    <img src="./styles/forumus-default-version/theme/images/sidebar-ad/orange-banner-ad-300x250.png" alt="" class="img-responsive" style="display: none !important;">
								    </a>
								    <div class="ad--2 clearfix">
                                        <a href="#" class="ad">
                                            <img src="./styles/forumus-default-version/theme/images/sidebar-ad/empty-ad-125x125.jpg" alt="" class="img-responsive">
                                        </a>
                                        <a href="#" class="ad">
                                            <img src="./styles/forumus-default-version/theme/images/sidebar-ad/empty-ad-125x125.jpg" alt="" class="img-responsive">
                                        </a>
								    </div>
								</div>
								<!-- Sidebar Ad Widget Start -->
							</div>
						</div>
						<!-- Topic Sidebar Widget End -->
						
						<!-- Topic Sidebar Widget Start -->
						<div class="topic-sidebar--widget">
							<div class="topic-list--header clearfix">
								<span class="topic-list-header--title"><i class="fa fa-users"></i>TOTAL MEMBERS</span>
								<span class="topic-list-header--toggle-btn"><i class="fa fa-minus"></i></span>
							</div>
							<div class="topic-list--content">
								<!-- Sidebar Statistics Widget Start -->
								<div class="topic-sidebar-widget--statistics">
								    								    									<p>In total there is <strong>1</strong> user online :: 0 registered, 0 hidden and 1 guest</p>
								</div>
								<!-- Sidebar Statistics Widget End -->
							</div>
						</div>
						<!-- Topic Sidebar Widget End -->
						
													<!-- Topic Sidebar Widget Start -->
							<div class="topic-sidebar--widget">
								<div class="topic-list--header clearfix">
									<span class="topic-list-header--title"><i class="fa fa-bar-chart"></i>Statistics</span>
									<span class="topic-list-header--toggle-btn"><i class="fa fa-minus"></i></span>
								</div>
								<div class="topic-list--content">
									<!-- Sidebar Statistics Widget Start -->
									<div class="topic-sidebar-widget--statistics">
										<p class="clearfix"></p>
										<p class="clearfix">3 topics</p>
									</div>
									<!-- Sidebar Statistics Widget End -->
								</div>
							</div>
							<!-- Topic Sidebar Widget End -->
						                    </div>
                    <!-- Topic Sidebar End -->
                </div>
            </div>
        </div>

 
<?php 
include'footer.php';
?>