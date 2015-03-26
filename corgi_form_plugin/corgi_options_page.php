<!----This Page sets up the options page in the plugin. It allows users to add in custom corgi features for the forms that can be found on the add corgi page-----!>
<div id="content">
	<div class="ada-admin">
		<div class="wrap">

      <h2><span class="corgi-header"></span><?php _e('Options','wp_corgi');?></h2>
        <h3><?php _e('Corgi Description','wp_corgi');?></h3>
        <p><?php _e('Add corgi descriptions by choosing the different corgi features and adding distinct discriptions!','wp_corgi');?></p>

        <a class="button" href="edit-tags.php?taxonomy=corgi-gender&post_type=corgi/"><?php _e( 'Add corgi gender','wp_corgi');?></a>
        <a class="button" href="edit-tags.php?taxonomy=corgi-size&post_type=corgi/"><?php _e( 'Add corgi size','wp_corgi');?></a>
        <a class="button" href="edit-tags.php?taxonomy=corgi-age&post_type=corgi/"><?php _e( 'Add corgi age','wp_corgi');?></a>
        <a class="button" href="edit-tags.php?taxonomy=corgi-pattern&post_type=corgi/"><?php _e( 'Add corgi pattern','wp_corgi');?></a>
        <a class="button" href="edit-tags.php?taxonomy=corgi-color&post_type=corgi/"><?php _e( 'Add corgi colour','wp_corgi');?></a>

		</div>
	</div>
</div>

