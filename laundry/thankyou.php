<?php 
include'header.php';
 $user_id=$_SESSION['user_id'];
$msg='';
if(isset($_POST['confirm'])){
    $city=$_POST['city'];
    $pack=$_POST['pack'];
    $pdate=$_POST['date'];
    $ptime=$_POST['time'];
    $ddate=$_POST['delivery_date'];
    $dtime=$_POST['delivery_time'];
    $Product_name=$_POST['Product_name'];
    $Product_price=$_POST['Product_price'];
    $qty=$_POST['qty'];
    $grantTotal=$_POST['grantTotal'];
    $address='';
    
    $stmt=$conn->prepare("SELECT `address` FROM `users` WHERE `user_id`= :user_id");
    $stmt->bindParam(':user_id',$_SESSION['user_id']);
    $stmt->execute();
    $stmt_data = $stmt->fetchAll();
    foreach ($stmt_data as $key => $data) {
        $address=$data['address'];
    }

    $stmt = $conn->prepare("INSERT INTO `laundry_order`(`user_id`, `branch`, `package`, `pickup_date`, `pickup_time`, `delivery_date`, `delivery_time`, `address`, `total`) VALUES (:user,:city,:pack,:pdate,:ptime,:ddate,:dtime,:address,:total)");
        $stmt->bindParam(':user',$_SESSION['user_id']);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':pack', $pack );
        $stmt->bindParam(':pdate', $pdate );
        $stmt->bindParam(':ptime', $ptime );
       $stmt->bindParam(':ddate', $ddate );
       $stmt->bindParam(':dtime', $dtime );
        $stmt->bindParam(':address', $address );
        $stmt->bindParam(':total', $grantTotal );


//         if (!mysqli_query($conn,"INSERT INTO `laundry_order`(`user_id`, `branch`, `package`, `pickup_date`, `pickup_time`, 'delivery_date', 'delivery_time', `address`, `total`) VALUES (:user,:city,:pack,:pdate,:ptime,:ddate,:dtime,:address,:total)"))
//   {
//   echo("Error description: " . mysqli_error($con));
//   }

// mysqli_close($con);
      
        if ($stmt->execute()) { 

            $msg='Your Order Has Been Received';
        }
        else{
           $msg="Somthing was wrong!!";
        }

}


?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="success"><?php if($msg !==''){echo $msg;}
        ?></h1>
        <br/>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>
</div>
<?php 
include'footer.php';
?>
	