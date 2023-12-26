<?php
/* ===============================================================================
  その他
=============================================================================== */


/*===================================
wp_head 不用な情報を消す
===================================*/
//バージョン
remove_action('wp_head', 'wp_generator');

/*
//遠隔投稿
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

//コメントフィードを削除
remove_action('wp_head', 'feed_links_extra', 3);
*/

// 「wp-block-library-css」を削除
function dequeue_plugins_style() {
	//プラグインIDを指定し解除する
	wp_dequeue_style('wp-block-library');
}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);



// function change_posts_per_page($query) {
//   if ( is_admin() || ! $query->is_main_query() )
//     return;
//   if ( $query->is_post_type_archive('products') ) {
//     $query->set( 'posts_per_page', '12' );
//     return;
//   }
// }
// add_action( 'pre_get_posts', 'change_posts_per_page' );


/***********************************************************
 * The lower layer is recognized as a template file by connecting it with an underscore.
 ***********************************************************/
add_filter('page_template_hierarchy', 'my_page_templates');
function my_page_templates($templates) {
  global $wp_query;

  $template = get_page_template_slug();
  $pagename = $wp_query->query['pagename'];

  if ($pagename && ! $template) {
    $pagename = str_replace('/', '__', $pagename);
    $decoded = urldecode($pagename);

    if ($decoded == $pagename) {
      array_unshift($templates, "page-{$pagename}.php");
    }
  }
  return $templates;
}

// if( function_exists('acf_add_options_page') ) {
//     acf_add_options_page();
// }

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
    if( function_exists('acf_add_options_page') ) {
				$front_page = acf_add_options_page(array(
            'page_title'    => __('Home General Settings'),
            'menu_title'    => __('Home Settings'),
            'menu_slug'     => 'home-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}


/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );


//breadcrumb
// calling the_breadcrumb the_breadcrumb();
function the_breadcrumb() {

  $sep = ' > ';

  if (!is_front_page()) {

      echo '<div class="breadcrumbs">';
      echo '<a href="';
      echo get_option('home');
      echo '">';
      bloginfo('name');
      echo '</a>' . $sep;


      if (is_category() || is_single() ){
          the_category('title_li=');
      } elseif (is_archive() || is_single()){
          if ( is_day() ) {
              printf( __( '%s', 'twentynov' ), get_the_date() );
          } elseif ( is_month() ) {
              printf( __( '%s', 'twentynov' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentynov' ) ) );
          } elseif ( is_year() ) {
              printf( __( '%s', 'twentynov' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentynov' ) ) );
          } else {
              _e( 'Blog Archives', 'twentynov' );
          }
      }


      if (is_single()) {
          echo $sep;
          the_title();
      }


      if (is_page()) {
          echo the_title();
      }


      if (is_home()){
          global $post;
          $page_for_posts_id = get_option('page_for_posts');
          if ( $page_for_posts_id ) { 
              $post = get_post($page_for_posts_id);
              setup_postdata($post);
              the_title();
              rewind_posts();
          }
      }

      echo '</div>';
  }
}
?>