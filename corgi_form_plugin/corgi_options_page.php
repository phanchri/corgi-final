<!----This Page sets up the options page in the plugin. It allows users to add in custom corgi features for the forms that can be found on the add corgi page-----!>
<div id="content">
	<div class="ada-admin">
		<div class="wrap">

      <h2><span class="corgi-header"></span><?php _e('Options','wp_corgi');?></h2>
        <h3><?php _e('Corgi Features','wp_corgi');?></h3>
        <p><?php _e('Add Corgi features in the specific categories to add option in the form!','wp_corgi');?></p>

        <a class="button" href="edit-tags.php?taxonomy=corgi-size&post_type=corgi/"><?php _e( 'Add Corgi Size','wp_corgi');?></a>
        <a class="button" href="edit-tags.php?taxonomy=corgi-age&post_type=corgi/"><?php _e( 'Add Corgi Age','wp_corgi');?></a>
        <a class="button" href="edit-tags.php?taxonomy=corgi-pattern&post_type=corgi/"><?php _e( 'Add Corgi Pattern','wp_corgi');?></a>
        <a class="button" href="edit-tags.php?taxonomy=corgi-color&post_type=corgi/"><?php _e( 'Add Corgi Colour','wp_corgi');?></a>

		</div>
	</div>
</div>

