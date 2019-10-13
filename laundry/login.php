<?php
include'header.php';
?>

<div id="topic">
	<div class="container">
		<div class="topic--body">
			<div class="topic--list">
				<div class="topic-list--header clearfix mb-10">
					<span class="topic-list-header--title">
														You need to login in order to post within this forum.
												</span>
				</div>
				<div class="topic-list--content">
					<div class="panel login-panel">
						<form action="./ucp.php?mode=login" method="post" id="login" data-focus="username">
						<div class="panel">
							<div class="inner">

							<div class="content">
								<fieldset class="fields1">
																<dl>
									<dt><label for="username">Username:</label></dt>
									<dd><input type="text" tabindex="1" name="username" id="username" size="25" value="" class="inputbox autowidth"></dd>
								</dl>
								<dl class="mb-10">
									<dt><label for="password">Password:</label></dt>
									<dd><input type="password" tabindex="2" id="password" name="password" size="25" class="inputbox autowidth mb-10" autocomplete="off"></dd>
																			<dd><a href="./ucp.php?mode=sendpassword">I forgot my password</a></dd>																											</dl>
																								<dl class="mb-10">
									<dd><label for="autologin"><input type="checkbox" name="autologin" id="autologin" tabindex="4"> Remember me</label></dd>									<dd><label for="viewonline"><input type="checkbox" name="viewonline" id="viewonline" tabindex="5"> Hide my online status this session</label></dd>
								</dl>
								
								<input type="hidden" name="redirect" value="./posting.php?f=3&amp;mode=post">

								<dl>
									<dt>&nbsp;</dt>
									<dd><input type="hidden" name="sid" value="dc32916fc780c8850de4f806d869e5a4">
<input type="submit" name="login" tabindex="6" value="Login" class="button1"></dd>
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

<?php
include'footer.php';
?>