<?php
include'header.php';

$message = "";

$deleteMessage="";

//PHP topic Delete Action Code
if (isset($_GET['tId'])) {
    $id = $_GET['tId']; 
} 
else { 
    $id = null; 
} 





//PHP Add topic From Action
if( isset($_POST['submit']) ) 
{
    if($_POST['ideatitle']=="")
    {
         $message='<div class="alert alert-danger"><strong>Error: </strong>Idea Title must be not empty!</div>';
    }else
    {
        $stmt = $conn->prepare("INSERT INTO `idea`(`idea_title`, `description`, `topic_id`, `username`, `datetime`) VALUES (:ideatitle,:description,:tid,:userid,now())");

        $stmt->bindParam(':ideatitle',$_POST['ideatitle']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':tid', $id);
        $stmt->bindParam(':userid',$_SESSION['user_id']);
      
        if ($stmt->execute()) { 
            $message='<div class="alert alert-success"><strong>Success: </strong>New Idea posted Successfully</div>';
        }
        else{
           $message="Somthing was wrong!!";
        }
    }
}
//End PHP Add topic From Action
/********************************************************************************************************************/

?>
		        
        <!-- Topic Area Start -->
        <div id="topic">
            <div class="container">
                <div class="row">
                    <!-- Topic Items Start -->
                    <div class="col-md-12 topic--body">
						<!-- Topic Breadcrumb Start -->
				
						<div id="topic">
	<div class="container">
		<div class="topic--body">
			<div class="topic--list">
				<div class="topic-list--header clearfix mb-10">
					<span class="topic-list-header--title">
<?php
$conn=DB();
$getTopic = $conn->prepare("SELECT topic_name FROM `topic` WHERE topic_id=$id");
$getTopic->execute();
$topcidata = $getTopic->fetchAll();
foreach ($topcidata as $data) {
		$topicName=$data['topic_name'];
}

?> 





													Add New Idea for <?php echo $topicName; ?> 
												</span>
				</div>
				<div class="topic-list--content">
					<div class="panel login-panel">

<div class="row">
	<div class="col-md-12">
		<?php
            if ($message != "") {
                echo $message;
            }
            ?>
		<form action="" method="post" name="topic">
						<div class="panel">
							<div class="inner">

							<div class="content">
								<fieldset class="fields1">
								<dl>
									<dt><label for="username">Idea:</label></dt>
									<dd><input type="text" tabindex="1" name="ideatitle" id="" size="25" value="" class="inputbox autowidth" placeholder="Idea Title"></dd>
								</dl>
								<dl>
									<dt><label for="description">Description</label></dt>
									<dd>
										<textarea id="mymce" name="description"></textarea>
									</dd>
								</dl>
						
								<dl>
									<dt>&nbsp;</dt>
									<dd><input type="submit" name="submit" tabindex="6" value="Submit" class="button1"></dd>
								</dl>
								</fieldset>
							</div>

														</div>
						</div>


						
						</form>
					</div>
	
</div>




						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


							
					
						
						

<!-- Topic Breadcrumb End -->                    </div>
                    <!-- Topic Items End -->
                    <!-- Topic Sidebar Start -->
                    
                </div>
            </div>
        </div>
        <!-- Topic Area End -->
<?php
include'footer.php';
?>