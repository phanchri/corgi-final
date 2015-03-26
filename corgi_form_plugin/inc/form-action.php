<?php




if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {
  global  $wpdb;

    $corginame =  $_POST['corginame'];
    $tags = $_POST['post_tags'];

    $corgiaddress = $_POST['corgi_address'];
    $corgivac = $_POST['corgi_vaccines'];

    $corgidesex = $_POST['corgi_desex'];
    $corgineeds = $_POST['corgi_needs'];
 



    // ADD THE FORM INPUT TO $new_post ARRAY
    $new_post = array(
    'post_title'    =>   $corginame,
    'post_category' =>   array($_POST['corgi_gender'],$_POST['corgi_size'],$_POST['corgi_age'],$_POST['corgi_color']),
    'post_type'     =>   'corgi',
    'tags_input'    =>   $tags,
    'corgi_address'	=>	$corgiaddress,
    'corgi_vaccines'	=>	$corgivac,
    'corgi_desex'	=>	$corgidesex,
    'corgi_needs'	=>	$corgineeds,


    );



    //SAVE THE POST
    $pid = wp_insert_post($new_post,$wperror);

    wp_set_post_terms($pid,array($_POST['corgi_gender']),'corgi-gender',true);
    wp_set_post_terms($pid,array($_POST['corgi_pattern']),'corgi-pattern',true);
    wp_set_post_terms($pid,array($_POST['corgi_size']),'corgi-size',true);
    wp_set_post_terms($pid,array($_POST['corgi_age']),'corgi-age',true);



    if(isset($_POST['corgi_color'])){
      if (is_array($_POST['corgi_color'])) {
        foreach($_POST['corgi_color'] as $value){
         wp_set_post_terms($pid,$value,'corgi-color',true);
        }
      }
    }



    //REDIRECT TO THE NEW POST ON SAVE
    $link = get_permalink( $pid );
    wp_redirect( $link );

    //ADD OUR CUSTOM FIELDS
    add_post_meta($pid, '_data_corgi_vaccines', $corgivac, true);
    add_post_meta($pid, '_data_corgi_address', $corgiaddress, true);
    add_post_meta($pid, '_data_corgi_desex', $corgidesex, true);
    add_post_meta($pid, '_data_corgi_needs', $corgineeds, true);


  if ($_FILES) {
  foreach ($_FILES as $file => $array) {
  $newupload = insert_attachment($file,$pid);
  // $newupload returns the attachment id of the file that
  // was just uploaded. Do whatever you want with that now.
  }
}


} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

    //POST THE POST
    do_action('wp_insert_post', 'wp_insert_post');


?>