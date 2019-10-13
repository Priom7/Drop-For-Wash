
						
		<!-- Footer Area Start -->
        <div id="footer">
        	<div class="container">
        		<div class="row">
					<!-- Footer About Widget Start -->
					    <div class="footer-about">
	                        <h4>About Us</h4>
	                        <p>Drop For Wash utilizes Lagoon® an Electrolux  process Approved by The Woolmark Company ~ a new eco-friendly alternative to traditional dry cleaning systems. It is a water-based ecological wet cleaning technology that uses no toxic chemicals. 

Utilizing Lagoon® by Electrolux, the NEW eco-friendly and affordable alternative to traditional dry cleaning with the following benefits:
1. Better for your clothes<br>
2. Better for the planet<br>
3. No toxic or ozone-deleting chemicals<br>
4. Your clothes are softer, cleaner and fresher<br>
5. The colours of your clothes are brighter</p>

							</div>
	                </div>
        		</div>
        	</div>
        <!-- Footer Area End -->
		
        <!-- Copyright Start -->
        <div id="copyright">
            <div class="container">
                <p>Copyright 2019 &copy; <a href="./index.php">Laundry</a>. All Rights Reserved. develovep by <b>Pranto</b></p>
            </div>
        </div>
        <!-- Copyright End -->

		<!-- Page Footer Area Start -->
		<div id="page-footer" role="contentinfo">
			<div id="darkenwrapper" data-ajax-error-title="AJAX error" data-ajax-error-text="Something went wrong when processing your request." data-ajax-error-text-abort="User aborted request." data-ajax-error-text-timeout="Your request timed out; please try again." data-ajax-error-text-parsererror="Something went wrong with the request and the server returned an invalid reply.">
				<div id="darken">&nbsp;</div>
			</div>

			<div id="phpbb_alert" class="phpbb_alert" data-l-err="Error" data-l-timeout-processing-req="Request timed out.">
				<a href="#" class="alert_close"></a>
				<h3 class="alert_title">&nbsp;</h3><p class="alert_text"></p>
			</div>
			<div id="phpbb_confirm" class="phpbb_alert">
				<a href="#" class="alert_close"></a>
				<div class="alert_text"></div>
			</div>
		</div>
		<!-- Page Footer Area End -->
		
		<!-- Back To Top Button Start -->
		<div class="back-to-top">
		    <button><i class="fa fa-angle-up"></i></button>
		</div>
		<!-- Back To Top Button End -->
	
					<!-- Login Form Modal Start -->
			<div id="LoginForm" class="modal fade">
				<div class="vc-parent">
					<div class="vc-child">
						<div class="modal-overlay" data-dismiss="modal"></div>
						<div class="modal-dialog">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="modal-header">
									<i class="fa fa-user"></i>Login
								</div>
								<div class="modal-body">
									<?php
            if ($login_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
            ?>
							<form action="" name="login" method="post">
										<input type="text" name="username" placeholder="Username" class="form-control" />
										<input type="password" name="password" placeholder="Password" class="form-control" />
										<input type="submit" name="btnLogin" value="Login" class="submit-btn" />
										

									</form>
																	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Login Form Modal End -->

			<!-- Login Form Modal Start -->
			<div id="JoinForm" class="modal fade">
				<div class="vc-parent">
					<div class="vc-child">
						<div class="modal-overlay" data-dismiss="modal"></div>
						<div class="modal-dialog">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="modal-header">
									<i class="fa fa-user"></i>Join
								</div>
								<div class="modal-body">
			<?php
            if ($register_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $register_error_message . '</div>';
            }
            ?>
										<form name="join" action="" method="post">
										<input type="text" name="name" placeholder="Full Name" class="form-control" />
										<input type="email" name="email" placeholder="Email" class="form-control" />
										<input type="text" name="username" placeholder="Username" class="form-control" />
										<input type="password" name="password" placeholder="Password" class="form-control" />
										<input type="submit" name="btnRegister" value="Join" class="submit-btn" />
									</form>
																	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Login Form Modal End -->


			</div>
	<!-- Wrapper End -->

<script type="text/javascript" src="./js/jquery.min.js?assets_version=3"></script>
<script type="text/javascript" src="./js/core.js?assets_version=3"></script>	
<script type="text/javascript" src="./js/boardannouncements.js?assets_version=3"></script>
<script type="text/javascript" src="./js/forum_fn.js?assets_version=3"></script>
<script type="text/javascript" src="./js/ajax.js?assets_version=3"></script>
<script type="text/javascript" src="./js/bootstrap.min.js?assets_version=3"></script>
<script type="text/javascript" src="./js/jquery.validate.min.js?assets_version=3"></script>
<script type="text/javascript" src="./js/jparticle.jquery.min.js?assets_version=3"></script>
<script type="text/javascript" src="./js/jquery.sticky.min.js?assets_version=3"></script>

<script type="text/javascript" src="./js/main.js?assets_version=3"></script>
<script type="text/javascript" src="./plugin/datatables/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="plugin/html5-editor/bootstrap-wysihtml5.js"></script>


<script type="text/javascript">
	$(document).ready(function () {
            $('#myTable').DataTable();
        });
</script>
<script>
        $(document).ready(function () {
            if ($("#mymce").length > 0) {
                tinymce.init({
                    selector: "textarea#mymce"
                    , theme: "modern"
                    , height: 300
                    , plugins: [
   "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker"
   , "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking"
   , "save table contextmenu directionality emoticons template paste textcolor"
   ]
                    , toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons"
                , });
            }
        });
    </script>
    
</body>
</html>
