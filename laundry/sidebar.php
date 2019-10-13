 <!-- Topic Sidebar Start -->
                    <div class="col-md-3 topic--sidebar">
												
						<!-- Topic Sidebar Widget Start -->
						<div class="topic-sidebar--widget">
							<div class="topic-list--header clearfix">
								<span class="topic-list-header--title"><i class="fa fa-users"></i>TOTAL MEMBERS</span>
								<span class="topic-list-header--toggle-btn"><i class="fa fa-minus"></i></span>
							</div>
							<div class="topic-list--content">
								<!-- Sidebar Statistics Widget Start -->
								<div class="topic-sidebar-widget--statistics">
									<?php

			$tmember = $conn->prepare("SELECT COUNT(user_id) FROM `users`");
			$tmember->execute();
			$members = $tmember->fetchAll();
			foreach ($members as $data) {
					$totalMember=$data['0'];
					
			}
									?>
		    <p class="clearfix">Total members <strong><?php echo $totalMember; ?></strong></p>
		
																		
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
<?php 
$tidea = $conn->prepare("SELECT COUNT(idea_id) FROM `idea`");
$tidea->execute();
$idea = $tidea->fetchAll();
foreach ($idea as $data) {
		$totalIdea=$data['0'];
		
}
$treplay = $conn->prepare("SELECT COUNT(comment_id) FROM `comment`");
$treplay->execute();
$replay = $treplay->fetchAll();
foreach ($replay as $data) {
		$totalReplay=$data['0'];
		
}
?>


									<p class="clearfix">Total Ideas <strong><?php echo $totalIdea; ?></strong></p>
									<p class="clearfix">Total Replays <strong><?php echo $totalReplay; ?></strong></p>
								</div>
								<!-- Sidebar Statistics Widget End -->
							</div>
						</div>
						<!-- Topic Sidebar Widget End -->
                    </div>
                    <!-- Topic Sidebar End -->