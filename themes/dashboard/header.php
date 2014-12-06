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
use WT\Auth;
require_once "library/Dashboard/Menu.php";
require_once "library/Dashboard/MenuBar.php";

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}
ini_set('display_errors', 1);
error_reporting(E_ALL);

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
		<!-- <link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>jquery-ui-1.10.3.custom.min.css" /> -->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>ace.css" />
		<link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>dashboard.css" />
		<link rel="stylesheet" href="<?php echo WT_CSS_URL; ?>style.css" />

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
				<a href="index.php" class="navbar-brand">
					<small>
						<i class="glyphicon glyphicon-tree-deciduous"></i>
						<?php echo  WT_TREE_TITLE; ?>
					</small>
				</a><!-- /.brand -->
			</div><!-- /.navbar-header -->

			<div class="navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">

					<?php echo Dashboard_MenuBar::getFavoritesMenu(); ?>
					<?php echo Dashboard_MenuBar::getThemeMenu(); ?>
					<?php echo Dashboard_MenuBar::getLanguageMenu(); ?>

				<?php
				if (Auth::check()) {
				?>
					<li class="light-brand-green">
						<a data-toggle="dropdown" href="index.html#" class="dropdown-toggle">
							<img class="nav-user-photo" src="//www.gravatar.com/avatar/<?php echo md5(strtolower(Auth::user()->getEmail())) ?>" alt="Bugbug's Photo">
							<span class="user-info">
								<small>Welcome,</small>
								<?php echo Auth::user()->getRealName(); ?>
							</span>

							<i class="fa fa-caret-down"></i>
						</a>

						<ul class="user-menu pull-right dropdown-menu dropdown-green dropdown-caret dropdown-close">

							<li>
								<a href="index.php?ctype=user">
									<i class="fa fa-user"></i>
									My Page
								</a>
							</li>

							<li>
								<a href="edituser.php">
									<i class="fa fa-cog"></i>
									Settings
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<?php /* echo logout_link(); */ ?>
								<a href="logout.php">
									<i class="fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				<?php
				} else {
				?>
					<li class="light-brand-green">
						<a href="<?php echo WT_LOGIN_URL . '?url='.rawurlencode(get_query_url()); ?>">
							<i class="fa fa-lock"></i>
							Login
						</a>
					</li>
				<?php
				}
				?>
				</ul><!-- /.ace-nav -->
			</div><!-- /.navbar-header -->
		</div><!-- /.container -->
    </nav>

	<div class="main-container" id="main-container">

		<div class="main-container-inner">
			<a class="menu-toggler" id="menu-toggler" href="index.html#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar">

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<a class="btn btn-success" href="index.php?ctype=gedcom">
							<i class="glyphicon glyphicon-tree-deciduous"></i>
						</a>

						<a class="btn btn-info" href="index.php?ctype=user">
							<i class="fa fa-user"></i>
						</a>

						<a class="btn btn-warning" href="pedigree.php">
							<i class="fa fa-group"></i>
						</a>

						<a class="btn btn-danger" href="edituser.php">
							<i class="fa fa-cogs"></i>
						</a>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- #sidebar-shortcuts -->

				<ul class="nav nav-list">
					<?php echo Dashboard_MenuBar::getGedcomMenu();   ?>
					<?php echo Dashboard_MenuBar::getMyPageMenu();   ?>
					<?php echo Dashboard_MenuBar::getChartsMenu();   ?>
					<?php echo Dashboard_MenuBar::getListsMenu();    ?>
					<?php echo Dashboard_MenuBar::getCalendarMenu(); ?>
					<?php echo Dashboard_MenuBar::getReportsMenu();  ?>
					<?php echo Dashboard_MenuBar::getSearchMenu();   ?>
					<?php echo implode('', Dashboard_MenuBar::getModuleMenus()); ?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="fa fa-angle-double-left" data-icon1="fa fa-angle-double-left" data-icon2="fa fa-angle-double-right"></i>
				</div>

			</div>

			<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">
<!--
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

					<?php echo WT_FlashMessages::getHtmlMessages(); ?>
