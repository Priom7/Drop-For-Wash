

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


<hr>




<style>
body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}
</style>






<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="img/avater.png" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
						<?php
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
								?></h4>
                        <small><cite title="San Francisco, USA"><?php
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
								?>, <?php
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
								?> <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
						<br />
                        <p>
						<i class="fas fa-envelope"></i>   <?php
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
								?>
                            <br />
							<br/>
                            <i class="fas fa-phone-alt"> </i> <?php
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
								?>
                            <br /><br />
							
                            <i class="fas fa-genderless">  </i>   <?php
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
								?>
								<br/>
								<br />
							</p>
                        <!-- Split button -->
                        <div class="btn-group">
							<a class="btn btn-info btn-lg ml-auto action-button" style="margin:12px" role="button" href="edit_profile.php"><i class="fas fa-user-edit"> Edit Info</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>











<?php 
include'footer.php';
?>