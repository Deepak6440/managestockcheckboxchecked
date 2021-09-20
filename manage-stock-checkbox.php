$children = get_posts( array(
    'post_parent'   => $posts,
    'posts_per_page'=> -1,
    'post_type'   => 'product_variation',
     'post_status'  => 'publish'
) );

 

//$out_of_stock_staus = 'instock';
//$stock=5;

 

foreach ( $children as $thischild ) {
         update_post_meta( $thischild->ID, '_stock', wc_clean( $stock )); // stock count
    update_post_meta( $thischild->ID, '_stock_status', wc_clean( $out_of_stock_staus ) );
    update_post_meta($thischild->ID, "_manage_stock", "yes");

 

}

 

 $parent = get_posts( array(
    'post_parent'   => $posts,
    'posts_per_page'=> -1,
    'post_type'   => 'product',
     'post_status'  => 'publish'
) );

 


foreach ( $parent as $thisparent ) {
         update_post_meta($thisparent->ID, '_stock', wc_clean( $stock )); // stock count
    update_post_meta( $thisparent->ID, '_stock_status', wc_clean( $out_of_stock_staus ) );
    update_post_meta($thisparent->ID, "_manage_stock", "yes");

 

}
