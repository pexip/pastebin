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

<!DOCTYPE html>
<html lang="<?php echo basename($default_lang, ".php");?>">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(isset($p_title)) { echo $p_title.' - ';}echo $title; ?></title>
    <meta name="description" content="<?php echo $des; ?>" />
    <meta name="keywords" content="<?php echo $keyword; ?>" />
	<link rel="shortcut icon" href="<?php echo '//' . $baseurl . '/theme/' . $default_theme; ?>/img/favicon.ico">
    <link href="<?php echo '//' . $baseurl . '/theme/' . $default_theme; ?>/css/paste.css" rel="stylesheet" type="text/css" />
<?php
if (isset($ges_style))
{
    echo $ges_style;
}
if (isset($_SESSION['captcha_mode']) == "recaptcha") {
    echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
}
?>

  </head>

<body>
  <div id="top" class="clearfix">
    <!-- Start App Logo -->
    <div class="applogo">
      <a href="<?php echo '//' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\');?>" class="logo"><?php echo $site_name;?></a>
    </div>
    <!-- End App Logo -->

	<!-- Not yet implemented
    <form class="searchform">
      <input type="text" class="searchbox" id="searchbox" placeholder="Search">
      <span class="searchbutton"><i class="fa fa-search"></i></span>
    </form>
	//-->
	
    <!-- Start Top Menu -->
    <ul class="topmenu">
	<?php
	if ( isset($privatesite) && $privatesite == "on") { // Hide if site is private
		} else {
			if ($mod_rewrite == '1') {
			echo '<li><a href="' . '//' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/archive">Archive</a></li>';
			} else {
			echo '<li><a href="' . '//' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/archive.php">Archive</a></li>';
			}
		}
	?>
    </ul>
    <!-- End Top Menu -->

    <!-- Start Top Right -->
    <ul class="top-right">

    <li class="dropdown link">
		<?php if(isset($_SESSION['token'])) {
			echo '<a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><b>' . $_SESSION['username'] . '</b><span class="caret"></span></a>';
		} else {
			echo '<a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><b>Guest</b><span class="caret"></span></a>';
		}
		?>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
		<?php if(isset($_SESSION['token'])) {
				echo '<li role="presentation" class="dropdown-header">My Account</li>';
				  if ($mod_rewrite == '1') {
					echo '<li><a href="' . '//' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/user/' . $_SESSION['username'] . '"><i class="fa falist fa-clipboard"></i> Pastes</a></li>';
					echo '<li><a href="' . '//' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/profile"><i class="fa falist fa-user"></i> Settings</a></li>';
					} else {
						echo '<li><a href="' . '//' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/user.php?user=' . $_SESSION['username'] . '"><i class="fa falist fa-clipboard"></i> Pastes</a></li>';
						echo '<li><a href="' . '//' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/profile.php"><i class="fa falist fa-user"></i> Settings</a></li>';
					}
		?>
          <li class="divider"></li>
          <li><a href="./?logout"><i class="fa falist fa-sign-out"></i> Logout</a></li>
		<?php } else { ?>
          <li><a data-target="#signin" data-toggle="modal" href="#">Login</a></li>
		  <?php } ?>
		</ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->	

    
  <!-- Sign in -->
	<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Login</h4>
		  </div>
		  <div class="modal-body">
			<!-- Oauth -->
		<?php if ($enablegoog == "no") { } else { ?>
			<a href="oauth/google.php?login" class="btn btn-danger btn-block">
				<i class="fa fa-google"></i>Sign in with Google
			</a>
		<?php } ?>
			<!-- // -->
			  <!--
			  <div class="footer-links row">
			  </div>
			  -->			
		  </div>
		</div>
	  </div>
	</div>
