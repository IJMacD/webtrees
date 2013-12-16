<?php
// Header for webtrees theme
//
// webtrees: Web based Family History software
// Copyright (C) 2013 webtrees development team.
//
// Derived from PhpGedView
// Copyright (C) 2002 to 2009 PGV Development Team.  All rights reserved.
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

global $WT_IMAGES;
?>
<!DOCTYPE html>
<html <?php echo WT_I18N::html_markup(); ?>>

	<head>
		<meta charset="utf-8" />
		<title><?php echo WT_Filter::escapeHtml($title); ?></title>

		<?php echo header_links($META_DESCRIPTION, $META_ROBOTS, $META_GENERATOR, $LINK_CANONICAL); ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="icon" href="<?php echo WT_THEME_URL; ?>favicon.png" type="image/png">

		<!-- basic styles -->

		<link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>ace.css" />
		<link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>dashboard.css" />
<!-- 		<link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>style.css" />
 -->
		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

    <!-- HEADER -->
    <nav class="navbar navbar-default" id="navbar">
		<div class="navbar-container" id="navbar-container">
			<div class="navbar-header pull-left">
				<a href="index.html#" class="navbar-brand">
					<small>
						<i class="glyphicon glyphicon-tree-deciduous"></i>
						<?php echo  WT_TREE_TITLE; ?>
					</small>
				</a><!-- /.brand -->
			</div><!-- /.navbar-header -->

			<div class="navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="grey">
						<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
							<i class="fa fa-tasks"></i>
							<span class="badge badge-grey">4</span>
						</a>

						<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
							<li class="dropdown-header">
								<i class="glyphicon glyphicon-ok"></i>
								4 Tasks to complete
							</li>

							<li>
								<a href="index.html#">
									<div class="clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">65%</span>
									</div>

									<div class="progress progress-mini ">
										<div style="width:65%" class="progress-bar "></div>
									</div>
								</a>
							</li>

							<li>
								<a href="index.html#">
									<div class="clearfix">
										<span class="pull-left">Hardware Upgrade</span>
										<span class="pull-right">35%</span>
									</div>

									<div class="progress progress-mini ">
										<div style="width:35%" class="progress-bar progress-bar-danger"></div>
									</div>
								</a>
							</li>

							<li>
								<a href="index.html#">
									<div class="clearfix">
										<span class="pull-left">Unit Testing</span>
										<span class="pull-right">15%</span>
									</div>

									<div class="progress progress-mini ">
										<div style="width:15%" class="progress-bar progress-bar-warning"></div>
									</div>
								</a>
							</li>

							<li>
								<a href="index.html#">
									<div class="clearfix">
										<span class="pull-left">Bug Fixes</span>
										<span class="pull-right">90%</span>
									</div>

									<div class="progress progress-mini progress-striped active">
										<div style="width:90%" class="progress-bar progress-bar-success"></div>
									</div>
								</a>
							</li>

							<li>
								<a href="index.html#">
									See tasks with details
									<i class="fa fa-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="purple">
						<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
							<i class="fa fa-bell fa-animated-bell"></i>
							<span class="badge badge-important">8</span>
						</a>

						<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
							<li class="dropdown-header">
								<i class="fa fa-warning"></i>
								8 Notifications
							</li>

							<li>
								<a href="index.html#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
											New Comments
										</span>
										<span class="pull-right badge badge-info">+12</span>
									</div>
								</a>
							</li>

							<li>
								<a href="index.html#">
									<i class="btn btn-xs btn-primary fa fa-user"></i>
									Bob just signed up as an editor ...
								</a>
							</li>

							<li>
								<a href="index.html#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
											New Orders
										</span>
										<span class="pull-right badge badge-success">+8</span>
									</div>
								</a>
							</li>

							<li>
								<a href="index.html#">
									<div class="clearfix">
										<span class="pull-left">
											<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
											Followers
										</span>
										<span class="pull-right badge badge-info">+11</span>
									</div>
								</a>
							</li>

							<li>
								<a href="index.html#">
									See all notifications
									<i class="fa fa-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="green">
						<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
							<i class="fa fa-envelope fa fa-animated-vertical"></i>
							<span class="badge badge-success">5</span>
						</a>

						<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
							<li class="dropdown-header">
								<i class="fa fa-envelope-o"></i>
								5 Messages
							</li>

							<li>
								<a href="index.html#">
									<img src="img/avatar.png" class="msg-photo" alt="Alex&#39;s Avatar">
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Alex:</span>
											Ciao sociis natoque penatibus et auctor ...
										</span>

										<span class="msg-time">
											<i class="fa fa-time"></i>
											<span>a moment ago</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="index.html#">
									<img src="img/avatar3.png" class="msg-photo" alt="Susan&#39;s Avatar">
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Susan:</span>
											Vestibulum id ligula porta felis euismod ...
										</span>

										<span class="msg-time">
											<i class="fa fa-time"></i>
											<span>20 minutes ago</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="index.html#">
									<img src="img/avatar4.png" class="msg-photo" alt="Bob&#39;s Avatar">
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Bob:</span>
											Nullam quis risus eget urna mollis ornare ...
										</span>

										<span class="msg-time">
											<i class="fa fa-time"></i>
											<span>3:15 pm</span>
										</span>
									</span>
								</a>
							</li>

							<li>
								<a href="inbox.html">
									See all messages
									<i class="fa fa-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="light-brand-green">
						<a data-toggle="dropdown" href="index.html#" class="dropdown-toggle">
							<img class="nav-user-photo" src="img/bugbug_1.gif" alt="Bugbug's Photo">
							<span class="user-info">
								<small>Welcome,</small>
								Bugbug
							</span>

							<i class="fa fa-caret-down"></i>
						</a>

						<ul class="user-menu pull-right dropdown-menu dropdown-green dropdown-caret dropdown-close">
							<li>
								<a href="index.html#">
									<i class="fa fa-cog"></i>
									Settings
								</a>
							</li>

							<li>
								<a href="index.html#">
									<i class="fa fa-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="index.html#">
									<i class="fa fa-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul><!-- /.ace-nav -->
			</div><!-- /.navbar-header -->
		</div><!-- /.container -->
    </nav>

	<div class="main-container" id="main-container">

		<div class="main-container-inner">
			<a class="menu-toggler" id="menu-toggler" href="index.html#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="fa fa-group"></i>
						</button>

						<button class="btn btn-danger">
							<i class="fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- #sidebar-shortcuts -->

				<ul class="nav nav-list">
					<?php echo WT_MenuBar::getGedcomMenu();   ?>
					<?php echo WT_MenuBar::getMyPageMenu();   ?>
					<?php echo WT_MenuBar::getChartsMenu();   ?>
					<?php echo WT_MenuBar::getListsMenu();    ?>
					<?php echo WT_MenuBar::getCalendarMenu(); ?>
					<?php echo WT_MenuBar::getReportsMenu();  ?>
					<?php echo WT_MenuBar::getSearchMenu();   ?>
					<?php echo implode('', WT_MenuBar::getModuleMenus()); ?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="fa fa-angle-double-left" data-icon1="fa fa-angle-double-left" data-icon2="fa fa-angle-double-right"></i>
				</div>

			</div>

			<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">
						<li>
							<i class="fa fa-home home-icon"></i>
							<a href="index.html">Home</a>
						</li>
						<li class="active">Family</li>
					</ul><!-- .breadcrumb -->

					<div class="nav-search" id="nav-search">
						<form class="form-search" action="search.php" method="post">
							<input type="hidden" name="action" value="general">
							<input type="hidden" name="ged" value="<?php echo WT_GEDCOM; ?>">
							<input type="hidden" name="topsearch" value="yes">
							<span class="input-icon">
								<input type="search" name="query" placeholder="<?php echo WT_I18N::translate('Search'); ?>" class="nav-search-input" id="nav-search-input" autocomplete="off">
								<i class="fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- #nav-search -->
				</div>

				<div class="page-content">














					<!-- 

	<?php if ($view!='simple') { ?>
	<div id="header">
		<ul id="extra-menu" class="makeMenu">
			<li>
				<?php
				if (WT_USER_ID) {
					echo '<a href="edituser.php">', WT_I18N::translate('Logged in as '), ' ', getUserFullName(WT_USER_ID), '</a></li> <li>', logout_link();
				} else {
					echo login_link();
				}
				?>
			</li>
			<?php echo WT_MenuBar::getFavoritesMenu(); ?>
			<?php echo WT_MenuBar::getThemeMenu(); ?>
			<?php echo WT_MenuBar::getLanguageMenu(); ?>
		</ul>
	</div>
	<?php } ?>
	<?php echo $javascript; ?>
	<?php echo WT_FlashMessages::getHtmlMessages(); ?>
	<div id="content">
 -->