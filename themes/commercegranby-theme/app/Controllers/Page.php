<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use DateTime;
use WP_Query;

class Page extends Controller
{
  use Partials\FlexibleContent;
  use Partials\PageHeader;
  
  var $acf_fields;

  public function __construct() {
    $this->acf_fields = (object) get_fields();
  }

  /* used by partials - flexible content */
  public static function events_list() {

    $date = new \DateTime();
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

    return $query_events->posts;

  }

  public static function get_featured_content( $content_id ) {

    if ( !empty($content_id) ) {
      $output = (object) array(
        'link'      => get_field('link', $content_id),
        'title'     => get_field('title', $content_id)
      );
    }else {
      $output = false;
    }

    return $output;

  }

}
