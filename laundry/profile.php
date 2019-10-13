

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
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            Bhaumik Patel</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
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