<?php
include 'header.php';
$conn=DB();
$message='';
$stmt='';


 if(isset($_POST['updateprofile']))
    {
      $name=($_POST['name']);
      $email=($_POST['email']);
      $phone=($_POST['phone']);
      $gender=($_POST['gender']);
      $city=($_POST['city']);
      $address=($_POST['address']);

        $stmt = $conn->prepare(" UPDATE `users` SET `name`=:name, `email`=:email,`phone`=:phone,`gender`=:gender,`city`=:city,`address`=:address WHERE `user_id`=:user_id");
        $stmt->bindparam(':user_id',$_SESSION['user_id']);


        $stmt->bindParam(':name',$_POST['name']);
         $stmt->bindParam(':email',$_POST['email']);
          $stmt->bindParam(':phone',$_POST['phone']);
           $stmt->bindParam(':gender',$_POST['gender']);
            $stmt->bindParam(':city',$_POST['city']);
             $stmt->bindParam(':address',$_POST['address']);

        if ($stmt->execute()) { 
            $message='<div class="alert alert-success"><strong>Success: </strong>Topic Update Successfully</div>';
        }
        else{
           $message="Somthing was wrong!!";
        }
    }


?>





<div class="container bootstrap snippet">
    <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
      <hr>
  <div class="row">
      <!-- left column -->
      
      
      <!-- edit form column -->
        <h3><?php
                // check user login
                    if(empty($_SESSION['user_id']))
                    {
                       header("Location: login.php");
                    }
                    else
                    {
                      $user = $app->UserDetails($_SESSION['user_id']); // get user details
                      
                      echo $user->name;
                      
                      $userstatus=$user->username;

                    }
                ?>'s Personal info</h3>
        
       <?php
       if($message !=""){
        echo $message;

       }
       ?>


          <form method="post" action="" name="profile"  style="width:450px;max-width:100%;">
                        <h2 class="text-center">Update Your Informations.</h2>
                        <div class="form-group"><input class="form-control" type="text" name="name" id="name" placeholder="full name"></div>
                        <div class="form-group"><input class="form-control" type="email" name="email" id="email" placeholder="Email"></div>
                        <div class="form-group"><input class="form-control" type="tel" name="phone" id="phone" placeholder="phone" maxlength="15" minlength="10"></div>
                        <div class="form-group"><select class="form-control" name="gender"><option value="Male" selected="">Male</option><option value="Female">Female</option></optgroup></select></div>
                        <div class="form-group"><select class="form-control" name="city"><option value="Kuala Lumpur" selected="">Kuala Lumpur</option><option value="Penang">Penang</option><option value="Pahang">Pahang</option></optgroup></select></div>
                        <div class="form-group"><input class="form-control" type="text" name="address" placeholder="address"></div>
                        <div class="form-group">
                        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="updateprofile">Update</button></div>
                        </form>
      </div>
  </div>
</div>
<hr>



<?php 
include'footer.php';
?>