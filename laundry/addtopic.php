<?php
include'header.php';
               

$message = "";

$deleteMessage="";

$conn=DB();

//PHP topic Delete Action Code
if (isset($_GET['topicIDd'])) { 
    $id = $_GET['topicIDd']; 
} 
else { 
    $id = null; 
} 

try {
	$stmt = $conn->prepare("DELETE FROM `topic` WHERE `topic_id`= $id");
        if ($stmt->execute()) {
        	$deleteMessage='<div class="alert alert-success"><strong>Success: </strong>Topic delete Successfully</div>';
        }
}
catch(PDOException $e) {
  echo $e->getMessage();
}
//End PHP topic Delete Action Code



//PHP Add topic From Action
if( isset($_POST['submit']) ) 
{
    if($_POST['topicname']=="")
    {
         $message='<div class="alert alert-danger"><strong>Error: </strong>Topic name must be not empty!</div>';
    }else
    {
        $stmt = $conn->prepare("INSERT INTO `topic`( `topic_name`, `description`, `user_id`, `date`) VALUES (:topicname,:description,:user_id,now())");


        $stmt->bindParam(':topicname',$_POST['topicname']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
      
        if ($stmt->execute()) { 
            $message='<div class="alert alert-success"><strong>Success: </strong>New topic added Successfully</div>';
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
													Add New Topic
												</span>
				</div>
				<div class="topic-list--content">
					<div class="panel login-panel">

<div class="row">
	<div class="col-sm-6">
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
									<dt><label for="username">Topic Name:</label></dt>
									<dd><input type="text" tabindex="1" name="topicname" id="" size="25" value="" class="inputbox autowidth" placeholder="Topic name"></dd>
								</dl>
								<dl>
									<dt><label for="description">Description</label></dt>
									<dd><input type="text" tabindex="1" name="description" id="description" size="25" value="" class="inputbox autowidth" placeholder='Description'><br>
										<span style="font-size: 10px">Please give description 100 to 150 words only</span>
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
	<div class="col-md-6 panel">
			<?php
            if ($deleteMessage != "") {
                echo $deleteMessage;
            }
            ?>

<div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Topic Name</th>
                                <th>Date</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>

<?php
$s=1;
$getBuilding = $conn->prepare("SELECT topic_id,topic_name,description,users.username,date FROM `topic` INNER JOIN users ON topic.user_id=users.user_id");
$getBuilding->execute();
$Building = $getBuilding->fetchAll();
foreach ($Building as $data) {

		$topicID=$data['0'];
		$topicname=$data['1'];
		$description=$data['2'];
		$username=$data['3'];
		$date=$data['4'];
    echo '<tr><td>'.$s++.'</td><td>'.$topicname.'</td><td>'.$date.'</td>
          <td><a href="edittopic.php?topicID='.$topicID.'" class="btn btn-info m-l-20 waves-effect waves-light" style="color:#ffffff">Eidt</a>
              <a href="addtopic.php?topicIDd='.$topicID.'" class="btn btn-danger m-l-20 waves-effect waves-light" style="color:#ffffff">Delete</a>
              
         </tr>';
}

?>                            
                            
                            
                            </tbody>
                    </table>
                </div>
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