<?php 
/**
 *  Trigger this file on Plugin uninstall
 *  @package HepekPlugin
 */

 if (! defined('WP_UNINSTALL_PLUGIN')) {
     die;
 }


 // brisanje custom posta iz baze
 $books = get_posts(array('post_type'=>'book','numberposts'=> -1 ));


 // PRVI NACIN
foreach ($books as $book) {

    wp_delete_post($book->ID, true);
}

 // Clear Database stored data

 // DRUGI NACIN

 global $wpdb;

 $wpdb->query("DELETE FROM mn_posts WHERE post_type = 'book' ");
 $wpdb->query("DELETE FROM mn_postsmeta WHERE post_id NOT IN ( SELECT id FROM mn_posts )");
 $wpdb->query("DELETE FROM mn_term_relationships WHERE object_id NOT IN ( SELECT id FROM mn_posts)");
