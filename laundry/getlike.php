<?php 
// Start Session
session_start();

// Application library ( with DemoLib class )
require __DIR__ . './lib/library.php';
$app = new DemoLib();
?>
<?php
if(isset($_POST['i_id'])) {
	$buildingID=$_POST['i_id'];

	$stmt = $conn->prepare("SELECT `idea-like` FROM `idea` WHERE `idea_id`=".($_POST['b_id']));
            $stmt->execute();
            $buildingdata = $stmt->fetchAll();
            foreach ($buildingdata as $data) {
           $like=$data['0'];
   echo $like;       
	}
	

} else {
	header('location: ./');
}
?>
