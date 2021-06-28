<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Page extends Controller
{
  use Partials\FlexibleContent;
  use Partials\PageHeader;
  
  var $acf_fields;

  public function __construct() {
    $this->acf_fields = (object) get_fields();
  }

  public function show_images_module() {
    return $this->acf_fields->images_module_enable;
  }

  /* used by partials - flexible content */
  public static function events_list() {

    $date = new DateTime();
    $today = $date->getTimestamp();

    $query_events = new WP_Query(
      array(
        'post_type'       => 'event',
        'post_status'     => 'publish',
        'posts_per_page'  => 6,
        'meta_key'        => 'start_date',
        'orderby'         => 'meta_value_num',
        'order'           => 'DESC',
        'meta_query'    => array(
          'relation'      => 'AND',
          array(
              'key'       => 'start_date',
              'compare'   => '>=',
              'value'     => $today,
          )
        )
      )
    );

    return $query_events;

  }

}
