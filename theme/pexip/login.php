<?php
/*
 * Paste <https://github.com/jordansamuel/PASTE> - Clean theme
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License in GPL.txt for more details.
 */
?>

<div class="content">
	<!-- START CONTAINER -->
	<div class="container-padding">
		<!-- Start Row -->
		<div class="row">
			<!-- Start Panel -->
			<div class="col-md-9 col-lg-10">
				<div class="panel panel-default">
					<div class="login-form" style="padding-top: 0px;">
					<?php
					// Logged in
					if (isset($success)) {
							echo '<div class="paste-alert alert3" style="text-align: center;">
									' . $success . '
								</div>';

						// Verification email sent
						if (isset($_GET['register']) && $verification == 'enabled')  {
							echo '<div class="paste-alert alert5" style="text-align: center;">
									' . $lang['versent'] . '
								</div>';
						}

					}

					// Errors
					elseif (isset($error)) {
						echo '<div class="paste-alert alert5" style="text-align: center;">
								' . $error . '
							</div>';
					}

					?>
						<!-- Oauth -->
					<?php if ($enablegoog == "no") { } else { ?>
						<a href="oauth/google.php?login" class="btn btn-danger btn-block">
							<i class="fa fa-google"></i>Sign in with Google
						</a>
					<?php } ?>
						<!-- // -->

					</div>
				</div>
			</div>

<?php require_once('theme/'.$default_theme.'/sidebar.php'); ?>
<?php echo $ads_2; ?>
