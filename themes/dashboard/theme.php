<?php

require_once 'lib/Twig/Autoloader.php';
Twig_Autoloader::register();

use Fisharebest\Webtrees;

/**
* Class Dashboard - This is a template showing how to create a custom theme.
*
* Since theme folders beginning with an underscore are reserved for special
* use, you should copy this entire folder ("themes/_custom") to a new name.
* For example, "themes/custom".  You should also rename the class.
*
* In this example, we are extending the webtrees theme, but you could
* also extend any of the core themes, or even the base theme.  You
* should choose a unique class name, as users may install many custom themes.
*
* Only the first two functions are required: themeId() and themeName().
* The rest are just examples, and should be removed in actual themes.
*/
class DashboardTheme extends Webtrees\WebtreesTheme {

	private $twig;

	function hookAfterInit(){
		$loader = new Twig_Loader_Filesystem('themes/dashboard/views');
		$this->twig = new Twig_Environment($loader, array(
			// 'cache' => 'themes/dashboard/_cache',
		));
	}

	/**
	* Give your theme a unique identifier.  Themes beginning with an underscore
	* are reserved for internal use.
	*
	* {@inheritdoc}
	*/
	public function themeId() {
		return 'dashboard';
	}

	/**
	* Give your theme a name.  This is shown to the users.
	* Use HTML entities where appropriate.  e.g. “Black &amp; white”.
	*
	* You could use switch($this->locale) {} to provide a translated versions
	* of the theme name.
	*
	* {@inheritdoc}
	*/
	public function themeName() {
		return 'Dashboard';
	}

	/**
	* This is an example function which shows how to add an additional CSS file to the theme.
	*
	* {@inheritdoc}
	*/
	public function stylesheets() {
		try {
			//$css_files   = parent::stylesheets();
			$css_files = [];
			// assetUrl from parent (Webtrees) theme
			$css_files[] = $this->assetUrl() . "style.css";
			// Put a version number in the URL, to prevent browsers from caching old versions.
			$css_files[] = WT_BASE_URL . 'themes/dashboard/css/bootstrap.min.css';
			$css_files[] = WT_BASE_URL . 'themes/dashboard/css/font-awesome.min.css';
			$css_files[] = 'http://fonts.googleapis.com/css?family=Open+Sans:400,300';
			$css_files[] = WT_BASE_URL . 'themes/dashboard/css/ace.css';
			$css_files[] = WT_BASE_URL . 'themes/dashboard/css/dashboard.css';
		} catch (\Exception $ex) {
			// Something went wrong with our script?  Use the default behaviour instead.
			return parent::stylesheets();
		}

		return $css_files;
	}

	public function bodyHeader() {
		if(Webtrees\Auth::check()){
			$user = Webtrees\Auth::user();
			$user->avatar = "//www.gravatar.com/avatar/" . md5(strtolower($user->getEmail()));
			$user->is_admin = Webtrees\Auth::isAdmin();
		}
		else {
			$user = null;
		}
		$context = array(
			'site' => array(
				'tree_title' => WT_TREE_TITLE,
				'login_url' => WT_LOGIN_URL . '?url='.rawurlencode(Webtrees\get_query_url()),
			),
			'menu' => array(
				'primary' => $this->primaryMenu(),
				'secondary' => $this->secondaryMenu(),
			),
			'user' => $user,
		);
		return $this->twig->render('bodyHeader.twig', $context);
		// '<body>' .
		// '<header>' .
		// $this->headerContent() .
		// $this->primaryMenuContainer($this->primaryMenu()) .
		// '</header>' .
		// '<main id="content" role="main">' .
		// $this->flashMessagesContainer(Webtrees\FlashMessages::getMessages());
	}

	public function hookFooterExtraJavascript() {
		return parent::hookFooterExtraJavascript().
			'<script src="' . WT_BASE_URL . 'themes/dashboard/js/bootstrap.min.js"></script>'.
			'<script src="' . WT_BASE_URL . 'themes/dashboard/js/ace.js"></script>';
	}

	function secondaryMenu() {
		return array(
			$this->menuFavorites(),
			$this->menuThemes(),
			$this->menuLanguages(),
		);
	}
}

return new DashboardTheme; // This script must return a theme object.
