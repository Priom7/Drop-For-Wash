<?php 
include'header.php';
if (isset($_GET['ideaId'])) { 
    $id = $_GET['ideaId']; 
} 
else { 
    $id = null; 
}
$conn=DB();
$query = "SELECT `idea_id`,`idea_title`,idea.`description`,topic.topic_name,`username`,`datetime`,idea.`idea-like`,idea.`idea-dislike` FROM `idea` INNER JOIN topic ON idea.topic_id=topic.topic_id WHERE idea_id=:id"; 
$query_params = array( 
    ':id' => $id); 
try { 
    $stmt = $conn->prepare($query);  
    $result = $stmt->execute($query_params);      
} 
catch(PDOException $ex){ 
    die("Failed to run query: " . $ex->getMessage());  
} 
$rows = $stmt->fetchAll(); 
foreach ($rows as $data) {

$ideaID=$data['0'];
	$ideatitle=$data['1'];
	$description=$data['2'];
	$topicname=$data['3'];
	$username=$data['4'];
	$datetime=$data['5'];
	$like=$data['6'];
	$dislike=$data['7'];
}

$message="";
//PHP Add topic From Action
if( isset($_POST['CommentBtn']) ) 
{
    if($_POST['Comment']=="")
    {
         $message='<div class="alert alert-danger"><strong>Error: </strong>Comment something!!</div>';
    }else
    {
        $stmt = $conn->prepare("INSERT INTO `comment`(`idea_id`, `comment`, `username`, `datetime`) VALUES (:ideaId,:comment,:username,now())");
        $stmt->bindParam(':ideaId',$id);
        $stmt->bindParam(':comment', $_POST['Comment']);
        $stmt->bindParam(':username', $userstatus);
      
        if ($stmt->execute()) { 
            
        }
        else{
           $message="Somthing was wrong!!";
        }
    }
}
//End PHP Add topic From Action



?>

<div id="topic">
            <div class="container">
                <div class="row">
                    <!-- Topic Items Start -->
                    <div class="col-md-9 topic--body">
				<div class="topic-list--header clearfix">
				<span class="topic-list-header--title">
				   <?php echo $topicname; ?>
				</span>
				</div>
<div class="topic-list--content">
<ul>
<li>

<div id="p4" class="topic--post post has-profile">
<div class="postbody">
<div id="post_content4">

<h3 class="first"><?php echo $ideatitle; ?></h3>

<ul class="post-buttons">
</li>
</ul>
<p class="author"><?php echo $datetime ?></p>
<div class="content">
	<?php echo $description; ?>
</div>
<hr>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="plugin/Like/js/like-dislike.min.js"></script>
<input type="hidden" value="<?php echo $ideaID; ?>" id="rid" name="">

<!--Ajax code for get levels from building selection-->
<script type="text/javascript">
            $(document).ready(function() {
        $("#like").click(function() {
            var like = $(#rid).val();
            if(like != "") {
                $.ajax({
                    url:"getlike.php",
                    data:{i_id:like},
                    type:'POST',
                    success:function(response) {
                        var resp = $.trim(response);
                        $("#likes").html(resp);
                    }
                });
            } else {
                $("#likes").html("0");
            }
        });
        });
</script>
<!--Ajax code end here-->
<!--Ajax code for get levels from building selection-->
<script type="text/javascript">
            $(document).ready(function() {
        $("#like").click(function() {
            var like = $(#rid).val();
            if(like != "") {
                $.ajax({
                    url:"getdislike.php",
                    data:{i_id:like},
                    type:'POST',
                    success:function(response) {
                        var resp = $.trim(response);
                        $("#likes").html(resp);
                    }
                });
            } else {
                $("#likes").html("0");
            }
        });
        });
</script>
<!--Ajax code end here-->


<div id="rating">
    <button class="like">Like</button>
    <span class="likes"><?php echo $like; ?></span>
    <button class="dislike">Dislike</button>
    <span class="dislikes"><?php echo $dislike; ?></span>
</div>
<script type="text/javascript">
    $('#rating').likeDislike({
        initialValue: 0,
        click: function (value, l, d, event) {
            var likes = $(this.element).find('.likes');
            var dislikes = $(this.element).find('.dislikes');

            likes.text(parseInt(likes.text()) + l);
            dislikes.text(parseInt(dislikes.text()) + d);
this.readOnly(false);
            // $.ajax({
            //     url: 'url',
            //     type: 'post',
            //     data: 'value=' + value,
            // });
        }
    });
</script>
<hr>
<form action="" method="post" name="topic">
<div class="panel">
<div class="inner">

<div class="content">
	<?php
            if ($message != "") {
                echo $message;
            }
            ?>
<fieldset class="fields1">
<dl>
<dt><label for="description">Comment</label></dt>
<dd><textarea rows="4" name="Comment" placeholder="Comment here"></textarea><br>
</dd>
</dl>

<dl>
<dt>&nbsp;</dt>
<dd><input type="submit" name="CommentBtn" tabindex="6" value="Submit" class="button1"></dd>
</dl>
</fieldset>
</div>

</div>
</div>
</form>
<hr>
<h3>Comments:</h3>
<?php
$getBuilding = $conn->prepare("SELECT * FROM `comment` WHERE idea_id=$id");
$getBuilding->execute();
$Building = $getBuilding->fetchAll();
foreach ($Building as $data) {
		$comment=$data['comment'];
		$username=$data['username'];
		$datetime=$data['datetime'];
echo'<h4>'.$username.' <span style="font-size:13px; color:blue"> '.$datetime.' </span></h4>';	
echo'<div style="padding-left:100px">'.$comment.'</div>';
echo'<hr>';	
}

?>


</div>

</div>
</div>
</li>
</ul>
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