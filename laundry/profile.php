

<?php 
include'header.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>

<div class="panel panel-default center">
  <div class="panel-heading">
  <img src="img/user_avater.png" alt="Avatar" class="avatar">
    <h2 class=""><?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											$userstatus="anonymous";
											// get user details
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											
											echo $user->username;
											
											$userstatus=$user->username;

										}
								?></h2></div>
   
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?php
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
								?></h4></span>
                   
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">


           
    
              
<div class="col-sm-5 col-xs-6 tital " >Full Name:</div><div class="col-sm-7 col-xs-6 "><?php
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
								?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>



<div class="col-sm-5 col-xs-6 tital " >UserName:</div><div class="col-sm-7"> <?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											 header("Location: login.php");
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											
											echo $user->username;
											
											$userstatus=$user->username;

										}
								?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"><?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											 header("Location: login.php");
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											
											echo $user->email;
											
											$userstatus=$user->username;

										}
								?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone Number:</div><div class="col-sm-7"><?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											 header("Location: login.php");
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											
											echo $user->phone;
											
											$userstatus=$user->username;

										}
								?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Gender:</div><div class="col-sm-7"><?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											 header("Location: login.php");
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											
											echo $user->gender;
											
											$userstatus=$user->username;

										}
								?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >City:</div><div class="col-sm-7"><?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											 header("Location: login.php");
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											
											echo $user->city;
											
											$userstatus=$user->username;

										}
								?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7"><?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											 header("Location: login.php");
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											
											echo $user->address;
											
											$userstatus=$user->username;

										}
								?></div>




            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
       
       
       
       
       
       
       
       
       
   </div>
   <hr>

<a class="btn btn-info btn-lg ml-auto action-button" style="margin:12px" role="button" href="edit_profile.php">UPDATE PROFILE</a>
<?php 
include'footer.php';
?>