<?php
// create custom plugin settings menu
add_action('admin_menu', 'contect_message_sett');

function contect_message_sett() {

	//create new top-level menu
	add_menu_page('message options add', 'add message options', 'administrator', __FILE__, 'contect_add_options' , 'dashicons-format-status' );

	//call register settings function
	add_action( 'admin_init', 'register_contect_settings' );
}


function register_contect_settings() {
	//register our settings
	register_setting( 'my-cool-plugin-settings-group', 'to-email' );
}

function contect_add_options() {
?>
<div class="wrap">
<h2><?php _e('message options','M-domin'); ?></h2>
<h3><?php _e('short code : [contactMessageuse]','M-domin'); ?></h3>
<p><?php _e('this is the short code you have to add to pages or posts','M-domin'); ?></p>
<form method="post" action="options.php">
    <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">to email</th>
        <td><input type="email" name="to-email" value="<?php echo esc_attr( get_option('to-email') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>