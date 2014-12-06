<?php

use WT\Menu;

class Dashboard_Menu extends WT_Menu {
  var $helpermenu = false;

  /**
   * Construct one of our menus from an existing menu
   * @param WT_Menu $menu
   * @return Dashboard_Menu
   */
  static function create($menu, $deep=true){

    if($menu === null){
      return;
    }

    if($deep && isset($menu->submenus)){
      $submenus = array();

      foreach($menu->submenus as $submenu){
        $submenus[] = Dashboard_Menu::create($submenu);
      }
    }else {
      $submenus = $menu->submenus;
    }

    $dashMenu = new Dashboard_Menu(
      $menu->label,
      $menu->link,
      $menu->id,
      $menu->onclick,
      $submenus
    );
    $dashMenu->class = $menu->class;
    $dashMenu->submenuclass = $menu->submenuclass;
    $dashMenu->iconclass = $menu->iconclass;

    return $dashMenu;
  }

  /**
  * Render this menu as an HTML list
  *
  * @return string
  */
  function getMenuAsList() {
    if($this->iconclass){
      $icon = '<i class="'.$this->iconclass.' fa-large"></i> ';
    }
    else {
      $icon = '';
    }
    if ($this->submenus) {
      $class = ' class="dropdown-toggle"';
    }
    else {
      $class = "";
    }
    if ($this->onclick) {
      $onclick = ' onclick="' . $this->onclick . '"';
    } else {
      $onclick = '';
    }
    if ($this->link) {
      $link = ' href="' . $this->link . '"';
    } else {
      $link = '';
    }
    if ($this->id) {
      $id = ' id="' . $this->id . '"';
    } else {
      $id = '';
    }
    if($this->helpermenu){
      $data = ' data-toggle="dropdown"';
    }
    else {
      $data = '';
    }
    $html = '<a' . $link . $class . $onclick . $data . '>' . $icon . $this->label . '</a>';
    if ($this->submenus) {
      if(!$this->helpermenu){
        // Main site menu
        $html .= '<ul class="submenu">';
      }
      else {
        // Top bar 'menus'
        $html .= '<ul class="dropdown-navbar dropdown-menu">';
      }
      foreach ($this->submenus as $submenu) {
        if ($submenu->submenus) {
          $submenu->iconclass.=' icon_arrow';
        }
        $html .= $submenu->getMenuAsList();
      }
      if($this->helpermenu){
        // helper menus have spare link at bottom
        $html .= '<li><a href="'.$this->link.'">'.$this->label.'</a></li>';
      }
      $html .= '</ul>';
    }

    return '<li' . $id . '>' . $html . '</li>';
  }
}
