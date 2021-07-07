<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/* helper used for @icon directive */
function locate_asset($asset)
{
   return trailingslashit(config('assets.path')) . sage('assets')->get($asset);
}

function include_icon( $icon_name, $classes = null )
{
  if( $classes )
    $classes = "icon $classes";
  else
    $classes = "icon";

  $icon = "icon-" . $icon_name;
  $filename = 'icons-sprite.svg'; //sprite sheet

  //return '<span class="'.$classes.'">' . file_get_contents($file_path) . '</span>';
  return '<svg class="'.$classes.'" role="img"><use xlink:href="#' . $icon . '"></use></svg>';
}

function isTemplate( $temp ) {
  return $temp == getTemplateSlug();
}

function getTemplateSlug() {
  $template = get_page_template_slug();
  $template = str_replace('views/template-', '', $template);
  $template = str_replace('.blade.php', '', $template);

  return $template;
}

function get_clean_formated_date( $post = '' ){
    $formated_date = [];
    $formated_date[ 'classes' ] = '';
    $formated_date[ '+' ] = '';
    $formated_date[ 'last_line' ] = '';

    $from_date = get_field( 'from_date', $post );
    $end_date = get_field( 'end_date', $post );
    if( !empty( $from_date ) || !empty( $end_date ) ){
        if( ICL_LANGUAGE_CODE == 'fr' ){
            setlocale(LC_TIME, 'fr_FR.UTF-8');
        }
        $from_str_month = strftime( '%B', strtotime( $from_date ) );
        $from_str_date = strftime( '%e', strtotime( $from_date ) );

        if( empty( $end_date ) ){
            $formated_date[ 'first_line' ] = $from_str_date;
            $formated_date[ 'last_line' ] = $from_str_month;
            $formated_date[ 'one_line' ] = $from_str_date . ' ' . $from_str_month;
        } else {
            $end_str_date = strftime( '%e', strtotime( $end_date ) );
            $end_str_month = strftime( '%B', strtotime( $end_date ) );

            if( $from_str_month != $end_str_month ){
                $formated_date[ 'classes' ] = 'smaller';
                $formated_date[ 'first_line' ] = $from_str_date .' '. $from_str_month;
                $formated_date[ 'last_line' ] = $end_str_date . ' ' . $end_str_month;
                $formated_date[ 'one_line' ] = $from_str_date . ' ' . $from_str_month . ' ' . t( 'common.to') . ' ' . $end_str_date . ' ' . $end_str_month;
            } else {
                $formated_date[ 'classes' ] = 'smaller';
                $formated_date[ 'first_line' ] = $from_str_date . '-' . $end_str_date;
                $formated_date[ 'last_line' ] = $from_str_month;
                $formated_date[ 'one_line' ] = $from_str_date . ' ' . t( 'common.to') . ' ' . $end_str_date . ' ' . $from_str_month;
            }
        }
    }

    $date_recursive = get_field( 'date_recursive', $post );
    if( !empty( $date_recursive ) ){
        $formated_date[ 'first_line' ] = $date_recursive;
        $formated_date[ 'classes' ] = 'smallest';
    }

    return $formated_date;
}