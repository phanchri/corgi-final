<?php




if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {
  global  $wpdb;

    $petname =  $_POST['petname'];
    $tags = $_POST['post_tags'];

    $petaddress = $_POST['pet_address'];
    $petvac = $_POST['pet_vaccines'];

    $petdesex = $_POST['pet_desex'];
    $petneeds = $_POST['pet_needs'];
 



    // ADD THE FORM INPUT TO $new_post ARRAY
    $new_post = array(
    'post_title'    =>   $petname,
    'post_category' =>   array($_POST['pet_gender'],$_POST['pet_size'],$_POST['pet_age'],$_POST['pet_color']),
    'post_type'     =>   'pet',
    'tags_input'    =>   $tags,
    'pet_address'	=>	$petaddress,
    'pet_vaccines'	=>	$petvac,
    'pet_desex'	=>	$petdesex,
    'pet_needs'	=>	$petneeds,


    );



    //SAVE THE POST
    $pid = wp_insert_post($new_post,$wperror);

    wp_set_post_terms($pid,array($_POST['pet_gender']),'pet-gender',true);
    wp_set_post_terms($pid,array($_POST['pet_pattern']),'pet-pattern',true);
    wp_set_post_terms($pid,array($_POST['pet_size']),'pet-size',true);
    wp_set_post_terms($pid,array($_POST['pet_age']),'pet-age',true);



    if(isset($_POST['pet_color'])){
      if (is_array($_POST['pet_color'])) {
        foreach($_POST['pet_color'] as $value){
         wp_set_post_terms($pid,$value,'pet-color',true);
        }
      }
    }



    //REDIRECT TO THE NEW POST ON SAVE
    $link = get_permalink( $pid );
    wp_redirect( $link );

    //ADD OUR CUSTOM FIELDS
    add_post_meta($pid, '_data_pet_vaccines', $petvac, true);
    add_post_meta($pid, '_data_pet_address', $petaddress, true);
    add_post_meta($pid, '_data_pet_desex', $petdesex, true);
    add_post_meta($pid, '_data_pet_needs', $petneeds, true);


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