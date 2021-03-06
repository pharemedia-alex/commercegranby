<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'commercegranby-theme');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'commercegranby-theme'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'commercegranby-theme');
        }
        return get_the_title();
    }

    public function footer() {
        $footer_content = (object) get_fields('options');
        return $footer_content;
    }

    public function header() {
        $header_theme = get_field('header_theme');

        if (is_404()) {
            $header_theme = 'o-theme-header-dark';
        }
        
        return (object) array(
            'theme' => $header_theme,
            'logo'  => ($header_theme=='o-theme-header-dark') ? 'inverse' : ''
        );
    }

    public function show_images_module() {
        return get_field('images_module_enable');
    }

    public static function get_images() {
        $images_module = get_field('images_module', 'option');
        return (object) $images_module;
    }

    public static function get_menu( $menu_name, $menu_id, $menu_classes='' ) {
        //menu with detached submenus
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

            $menu_items = wp_get_nav_menu_items($menu->term_id);
            $menu_list = '';
            $count = 0;
            $submenu_list= '';
            $submenu = false;
            $cpi=get_the_id();
            foreach( $menu_items as $current ) {
                    if($cpi == $current->object_id ){
                        if ( !$current->menu_item_parent ) {
                            $cpi=$current->ID;
                        }else{
                            $cpi=$current->menu_item_parent;
                        }
                        $cai=$current->ID;
                        break;
                    }else{
                        $cai=0;
                    }
            }

            $menu_list = '<ul id="'.$menu_id.'" class="nav ' . $menu_classes . '">';

            foreach( $menu_items as $menu_item ) {
                    $link = $menu_item->url;
                    $target = $menu_item->target;
                    $title = $menu_item->title;
                    $menu_item->ID==$cai ? $ac2=' current_menu' : $ac2='';
                    if ( !$menu_item->menu_item_parent ) {
                        $menu_classes = ( !empty($menu_item->classes) ) ? implode( " ", $menu_item->classes ) : '';
                            $parent_id = $menu_item->ID;$parent_id==$cpi ? $ac=' current-menu-item' : $ac='';
                            if(!empty($menu_items[$count + 1]) && $menu_items[ $count + 1 ]->menu_item_parent == $parent_id ){//Checking has child
                                    $menu_list .= '<li class="menu-item dropdown has_child'.$ac.' '.$menu_classes.'" data-dropdown="sub-menu-'.$menu_item->ID.'"><a href="'.$link.'" class="'.$ac2.'" role="button" target="'.$target.'">'.$title.'</a>';
                            }else{
                                    $menu_list .= '<li class="menu-item '.$ac.' '.$menu_classes.'">' ."\n";$menu_list .= '<a href="'.$link.'" class="'.$ac2.'">'.$title.'</a>' ."\n";
                            }

                    }
                    if ( $parent_id == $menu_item->menu_item_parent ) {
                            if ( !$submenu ) {
                                    $submenu = true;
                                    $submenu_list .= '<div class="sub-menu sub-menu-' . $parent_id . '"><ul>' ."\n";
                            }
                            $submenu_list .= '<li id="'.$menu_item->ID.'">' ."\n";
                            $submenu_list .= '<a href="'.$link.'" class="sub-menu-item '.$ac2.'" target="'.$target.'"><h4>'.$title.'</h4></a>';
                            $submenu_list .= '</li>' ."\n";
                            if(empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu){
                                $submenu_list .= '</ul></div>' ."\n";
                                $submenu = false;
                            }
                    }
                    if (empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) {
                            $menu_list .= '</li>' ."\n";
                            $submenu = false;
                    }
                    $count++;
            }
        } else {
                $menu_list .= '<li>Menu "' . $menu_name . '" not defined.</li>';
        }
        $menu_list .= self::get_language_link();
        $menu_list .= '</ul>';

        $menu_output = $menu_list . '<div class="sub-menu-container">' . $submenu_list . '<div class="sub-menu-background"></div></div>';

        return $menu_output;
    }

    public static function get_language_link() {
        global $sitepress_settings, $sitepress;
        if ( function_exists('icl_object_id') ) {
            $languages = $sitepress->get_ls_languages();
            if(!empty($languages)){
                foreach($languages as $code => $lang){
                    if ($lang['language_code'] != $sitepress->get_current_language()){
                        $items .= ' <li class="menu-item menu-item-language menu-item-language-current"><a href="' . $lang['url'] . $url_parameters . '">' . $lang['code'] . '</a></li>';
                    }
                }
            }
            return $items;
        }
    }

}
