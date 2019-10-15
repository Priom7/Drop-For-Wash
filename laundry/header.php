<?php
// Start Session
session_start();
$user_id='';
$username='';
// Application library ( with DemoLib class )
require __DIR__ . './lib/library.php';
$app = new DemoLib();

$login_error_message = '';
$register_error_message = '';
$userstatus='';

// check Login request
if (!empty($_POST['btnLogin'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == "") {
		$login_error_message = 'Username field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $user_id = $app->Login($username, $password); // check user login
        if($user_id > 0)
        {
            $_SESSION['user_id'] = $user_id; // Set Session
            $_SESSION['username'] = $username;
             $user_id=$_SESSION['user_id'];
            $username=$_SESSION['username'];
            header("Location: profile.php"); // Redirect user to the profile.php
        }
        else
        {
			$login_error_message = 'Invalid login details!';
			
        }
    }
}

// check Register request
if (!empty($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $register_error_message = 'Name field is required!';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email field is required!';
    } else if ($_POST['username'] == "") {
        $register_error_message = 'Username field is required!';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Password field is required!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Invalid email address!';
    } else if ($app->isEmail($_POST['email'])) {
        $register_error_message = 'Email is already in use!';
    } else if ($app->isUsername($_POST['username'])) {
        $register_error_message = 'Username is already in use!';
    } else {
        $user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password']);
        // set session and redirect user to the profile page
        $_SESSION['user_id'] = $user_id;
        header("Location: profile.php");
    }
}

$conn=DB();



?>
<!DOCTYPE html>
<html dir="ltr" lang="en-gb">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title><?php $site= $app->SiteDetails(); echo $site->site_name; ?></title>		

<script src="https://kit.fontawesome.com/e9cc859af3.js" crossorigin="anonymous"></script>

<!--
	phpBB style name: prosilver
	Based on style:   prosilver (this is the default phpBB3 style)
	Original author:  Tom Beddard ( http://www.subBlue.com/ )
	Modified by: ThemeLooks ( http://themelooks.com/ )
-->

<link href="./css/stylesheet.css?assets_version=3" rel="stylesheet">
<link href="./css/responsive.css?assets_version=3" rel="stylesheet" media="all and (max-width: 700px)">
<link href="./css/Features-Boxed.css" rel="stylesheet">
<link href="./css/Testimonials.css" rel="stylesheet">
<link href="./css/Brands.css" rel="stylesheet">
<link href="./css/edit-form.css" rel="stylesheet">
<link href="./css/Contact-Form-Clean.css" rel="stylesheet">



<!--[if lte IE 9]>
	<link href="./styles/forumus-default-version/theme/tweaks.css?assets_version=3" rel="stylesheet">
<![endif]-->

	
<link href="./css/boardannouncements.css?assets_version=3" rel="stylesheet" type="text/css" media="screen" />



    <!-- ====Google Font Stylesheet==== -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
	
    <!-- ====Bootstrap Stylesheet==== -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- ====Font Awesome Stylesheet==== -->
    <link href="./css/font-awesome.min.css" rel="stylesheet">
	
    <!-- ====ForumX Stylesheet==== -->
	<link href="./css/forumus-style.css" rel="stylesheet">
    
    <!-- ====Color Scheme Stylesheet==== -->
    <link href="./css/style-1-color-3.css" rel="stylesheet" id="mainColorScheme">
    
    <!-- ====Custom Stylesheet==== -->
    <link href="./css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="plugin/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="plugin/html5-editor/bootstrap-wysihtml5.css">

   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  

</head>
<body id="phpbb" class="nojs notouch section-index ltr " data-theme-path="./styles/forumus-default-version/theme">



	<!-- Wrapper Start -->
	<div class="wrapper">
	
        <!-- Header Area Start -->
        <div id="header">
            <!-- Header Topbar Start -->
            <div class="header--topbar">
						<div id="phpbb_announcement">
				<div></div>
	</div>
				            </div>
            <!-- Header Topbar End -->
            <!-- Primary Header Start -->
            <div class="header--primary">
                <div class="container">
                    <!-- Header Logo Start -->
                    <div class="header--logo">
						<div class="vc-parent">
							<div class="vc-child">
								<h1>
									<a href="./index.php">
                                        
										 
										 <!-- Text Logo (Site Name) -->
										<?php echo '<img src="img/logo2.png" alt="Avatar" width="200" height="50">';  ?>
									</a>
								</h1>
							</div>
						</div>
                    </div>
                    <!-- Header Logo End -->
                    <!-- Header Social Links Start -->
                    <div class="header--social">
                       
                    </div>
                    <!-- Header Social Links End -->
                    <!-- Header Login Start -->
                    <div class="header--login">
							
							<p>
								<?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											$userstatus="anonymous";
											// get user details
										   echo '<a href="#" data-toggle="modal" data-target="#JoinForm"><i class="fa fm fa-user"></i>Join</a>
								<a href="#" data-toggle="modal" data-target="#LoginForm"><i class="fa fm fa-user"></i>login</a>';
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											echo'<i class="fas fa-user"> Hello</i>, ';
											echo $user->username;
											echo'<br/><a href="logout.php"><i class="fas fa-sign-out-alt"> Logout</i></a>';

											$userstatus=$user->username;

										}
								?>



								  
								</p>
							
						                    </div>
                    <!-- Header Login End -->
                </div>
            </div>
            <!-- Primary Header End -->	
			<!-- Header Navbar Start -->
<div class="header--nav bg-bluewood">
	<div class="container">
				
				
		<ul class="header-nav--primary nav logged-out">


			<?php
								// check user login
										if(empty($_SESSION['user_id']))
										{
											echo'
			 <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-home"> Home</i></a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" href="pricing.php"><i class="fas fa-money-bill-wave"> Pricing</i></a></li>
               <li class="nav-item" role="presentation"><a class="nav-link" href="contact.php"><i class="fas fa-address-book"> Contact</i></a></li>
               <li class="nav-item" role="presentation"><a class="nav-link" href="forum.php"><i class="fas fa-hands-helping"> forum</i></a></li>
              </ul>';
											
										}
										else
										{
											$user = $app->UserDetails($_SESSION['user_id']); // get user details
											
											if($user->role==1){
												echo'<li><a href="profile.php"><i class="fas fa-user-circle"> Profile</i></a></a></li>
												<li><a href="users.php"><i class="fas fa-users"> All users</i></a></li>
												<li><a href="check_order.php"><i class="fas fa-boxes"> Orders</i></a></li>
												<li><a href="check_contact.php"><i class="fas fa-history"> Contact History</i></a></li>
												<li><a href="addtopic.php"><i class="fas fa-plus-square"> add Forum Topics</i></a></li><li><a href="forum.php"><i class="fas fa-hands-helping"> forum</i></a></li>'; 
											}
											if($user->role==2){
												echo'<li><a href="profile.php"><i class="fas fa-user-circle"> Profile</i></a></li>
												<li><a href="branch.php"><i class="fas fa-boxes"> Order</i></a></li>
												<li><a href="order-history.php"><i class="fas fa-box-open"> Check Orders</i></a></li>
												<li><a href="forum.php"><i class="fas fa-hands-helping"> forum</i></a></li>
												';
											}
										}
								?>

				
								
	</div>
	
	<div class="header-nav--tab">
		<div class="container">
			<div class="tab-content">
				<div class="header-nav--tabpane tab-pane" id="tab1">
					<ul class="nav">
						<li><a href="./search.php?search_id=active_topics"><i class="fa fm fa-comments-o"></i>Active topics</a></li>
							<li><a href="./search.php"><i class="fa fm fa-search"></i>Search</a></li>
									
                        <li class="hidden-md hidden-lg">
                            <a href="/forumus/app.php/help/faq" title="Frequently Asked Questions"><i class="fa fm fa-question-circle"></i>FAQ</a>
                        </li>

													<li><a href="./memberlist.php?mode=team"><i class="fa fm fa-users"></i>The team</a></li>
												
											</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Header Navbar End -->        </div>
        <!-- Header Area End -->
	