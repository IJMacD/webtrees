<?php

use WT\Auth;
use WT\MenuBar;
require_once "Menu.php";


class Dashboard_MenuBar extends WT_MenuBar {

  /**
  * @return Dashboard_Menu
  */
  public static function getGedcomMenu() {
    $menu = Dashboard_Menu::create(WT_MenuBar::getGedcomMenu());

    if($menu !== null){
      $menu->iconclass = "fa fa-home";

      foreach($menu->submenus as $submenu){
        $submenu->iconclass = "glyphicon glyphicon-tree-deciduous";
      }
    }

    return $menu;
  }

  /**
  * @return Dashboard_Menu
  */
  public static function getMyPageMenu() {
    $menu = Dashboard_Menu::create(WT_MenuBar::getMyPageMenu());

    if($menu !== null){
      $menu->iconclass = "fa fa-user";

      foreach($menu->submenus as $submenu){
        if($submenu->id === "menu-admin"){
          $submenu->iconclass = "fa fa-cog";
        }
      }
    }

    return $menu;
  }

  /**
  * @return Dashboard_Menu
  */
  public static function getChartsMenu() {
    $menu = Dashboard_Menu::create(WT_MenuBar::getChartsMenu());

    if($menu !== null){
      $menu->iconclass = "fa fa-bar-chart-o";
    }

    return $menu;
  }

  /**
  * @return Dashboard_Menu
  * @throws Exception
  */
  public static function getListsMenu() {
    $menu = Dashboard_Menu::create(WT_MenuBar::getListsMenu());

    if($menu !== null){
      $menu->iconclass = "fa fa-list";
    }

    return $menu;
  }

  /**
  * @return Dashboard_Menu
  */
  public static function getCalendarMenu() {
    $menu = Dashboard_Menu::create(WT_MenuBar::getCalendarMenu());

    if($menu !== null){
      $menu->iconclass = "fa fa-calendar";
    }

    return $menu;
  }

  /**
  * get the reports menu
  *
  * @return Dashboard_Menu the menu item
  */
  public static function getReportsMenu() {
    $menu = Dashboard_Menu::create(WT_MenuBar::getReportsMenu());

    if($menu !== null){
      $menu->iconclass = "fa fa-file-text-o";
    }

    return $menu;
  }

  /**
  * @return Dashboard_Menu
  */
  public static function getSearchMenu() {
    $menu = Dashboard_Menu::create(WT_MenuBar::getSearchMenu());

    if($menu !== null){
      $menu->iconclass = "fa fa-search";
    }

    return $menu;
  }

  /**
  * @return Dashboard_Menu[]
  */
  public static function getModuleMenus() {
    $menus=array();
    foreach (WT_Module::getActiveMenus() as $module) {
      $menu=$module->getMenu();
      if ($menu) {
        $menu = Dashboard_Menu::create($menu);

        switch($menu->id) {
          case "menu-indi":
          case "menu-fam":
          case "menu-sour":
          case "menu-obje":
          $menu->iconclass = "fa fa-edit";
          break;
        case "menu-clippings":
          $menu->iconclass = "glyphicon glyphicon-shopping-cart";
          break;
        }

        $menus[] = $menu;
      }
    }
    return $menus;
  }

  /**
  * @return null|Dashboard_Menu
  * @throws Exception
  */
  public static function getThemeMenu() {
    $menu = WT_MenuBar::getThemeMenu();

    if($menu){
      $menu = Dashboard_Menu::create($menu);
      $menu->helpermenu = true;
    }

    return $menu;
  }

  /**
  * @return null|Dashboard_Menu
  */
  public static function getLanguageMenu() {
    $menu = WT_MenuBar::getLanguageMenu();

    if($menu){
      $menu = Dashboard_Menu::create($menu);
      $menu->helpermenu = true;
    }

    return $menu;
  }

  /**
  * @return Dashboard_Menu
  * @throws Exception
  */
  public static function getFavoritesMenu() {
    $menu = WT_MenuBar::getFavoritesMenu();

    if($menu){
      $menu = Dashboard_Menu::create($menu);
      $menu->helpermenu = true;
    }

    return $menu;
  }
}
