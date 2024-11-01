<?php
/*
Plugin Name: TinyMCE Options Override
Plugin URI: http://businessxpand.com
Description: Allows an Administrator to override the TinyMCE styling options a user can use when creating or editing a post. Currently only a universal override, will be on a per-user basis in a future release.
Author: BusinessXpand.com
Version: 1.0.2
Author URI: http://businessxpand.com
*/

/**
 * @package TinyMCE Options Override
 * @author BusinessXpand.com
 * @version 1.0.2
 */

/**
 * TinyMCE Options Class
 *
 * @copyright 2009 Business Xpand
 * @license GPL v2.0
 * @author Thomas McGregor
 * @version 1.0.2
 * @link http://www.businessxpand.com/
 * @since File available since Release 1.0
 */
class TinyMCE_Options
{
    var $message;
		var $toolbar_options = array('toolbar_1' => 
																	array('bold' => 1,
																				'italic' => 1,
																				'strikethrough' => 1,
																				'spacer-1' => 1,
																				'bullist' => 1,
																				'numlist' => 1,
																				'blockquote' => 1,
																				'spacer-2' => 1,
																				'justifyleft' => 1,
																				'justifycenter' => 1,
																				'justifyright' => 1,
																				'spacer-3' => 1,
																				'link' => 1,
																				'unlink' => 1,
																				'wp_more' => 1,
																				'spacer-4' => 1,
																				'spellchecker' => 1,
																				'fullscreen' => 1,
																				'wp_adv' => 1),
																 'toolbar_2' => 
																	array('formatselect' => 1,
																				'underline' => 1,
																				'justifyfull' => 1,
																				'forecolor' => 1,
																				'spacer-5' => 1,
																				'pastetext' => 1,
																				'pasteword' => 1,
																				'removeformat' => 1,
																				'spacer-6' => 1,
																				'media' => 1,
																				'charmap' => 1,
																				'spacer-7' => 1,
																				'outdent' => 1,
																				'indent' => 1, 
																				'spacer-8' => 1,
																				'undo' => 1,
																				'redo' => 1,
																				'wp_help' => 1 )
																	);
																	
		var $toolbar_options_render = array('bold' 					=> array('text' => 'Bold',
																																 'class' => 'mce_bold'),
																				'italic' 				=> array('text' => 'Italic',
																																 'class' => 'mce_italic'),
																				'strikethrough' => array('text' => 'Strikethrough',
																																 'class' => 'mce_strikethrough'),
																				'bullist'				=> array('text' => 'Bullet List',
																																 'class' => 'mce_bullist'),
																				'numlist' 			=> array('text' => 'Numbered List',
																																 'class' => 'mce_numlist'),
																				'blockquote' 		=> array('text' => 'Block Quote',
																																 'class' => 'mce_blockquote'),
																				'justifyleft' 	=> array('text' => 'Justify Left',
																																 'class' => 'mce_justifyleft'),
																				'justifycenter' => array('text' => 'Justify Center',
																																 'class' => 'mce_justifycenter'),
																				'justifyright' 	=> array('text' => 'Justify Right',
																																 'class' => 'mce_justifyright'),
																				'link' 					=> array('text' => 'Add Hyperlink',
																																 'class' => 'mce_link'),
																				'unlink' 				=> array('text' => 'Remove Hyperlink',
																																 'class' => 'mce_unlink'),
																				'wp_more' 			=> array('text' => 'Wordpress\'s "more" tag',
																																 'class' => 'mce_wp_more',
																																 'display' => 'none'),
																				'spellchecker' 	=> array('text' => 'Spell Checker',
																																 'class' => 'mce_spellchecker',
																																 'display' => 'none'),
																				'fullscreen' 		=> array('text' => 'Fullscreen Edit',
																																 'class' => 'fullscreen',
																																 'display' => 'none'),
																				'wp_adv' 				=> array('text' => 'Show/Hide Advanced Options',
																																 'class' => 'mce_wp_adv',
																																 'display' => 'none'),
																				'formatselect' 	=> array('text' => 'Format Text',
																																 'class' => 'mce_forecolor',
																																 'display' => 'none'),
																				'underline' 		=> array('text' => 'Underline',
																																 'class' => 'mce_underline'),
																				'justifyfull' 	=> array('text' => 'Justify Full',
																																 'class' => 'mce_justifyfull'),
																				'forecolor' 		=> array('text' => 'Text Colour',
																																 'class' => 'mce_forecolor',
																																 'display' => 'none'),
																				'pastetext' 		=> array('text' => 'Paste Plaintext',
																																 'class' => 'mce_pastetext'),
																				'pasteword' 		=> array('text' => 'Paste text from Word',
																																 'class' => 'mce_pasteword'),
																				'removeformat' 	=> array('text' => 'Remove Text Formtting',
																																 'class' => 'mce_removeformat'),
																				'media' 				=> array('text' => 'Media',
																																 'class' => 'mce_media'),
																				'charmap' 			=> array('text' => 'Character Map',
																																 'class' => 'mce_charmap'),
																				'outdent' 			=> array('text' => 'Outdent Text',
																																 'class' => 'mce_outdent'),
																				'indent' 				=> array('text' => 'Indent Text',
																																 'class' => 'mce_indent'),
																				'undo' 					=> array('text' => 'Undo Button',
																																 'class' => 'mce_undo'),
																				'redo' 					=> array('text' => 'Redo Button',
																																 'class' => 'mce_redo'),
																				'wp_help' 			=> array('text' => 'WordPress Help',
																																 'class' => 'mce_wp_help',
																																 'display' => 'none'),);

    /**
     * Construct the plugin
     *
     * @author Thomas McGregor
     * @since 0.9
     *
     * @param void
     * @return null
     */
    function TinyMCE_Options()
    {				
        if ( is_admin() ) {
            add_action( 'init', array( &$this,'adminInit' ) );
            add_action( 'admin_menu', array( &$this, 'adminMenu' ) );
						add_action( 'edit_user_profile', array( &$this, 'personalTinyMCEOptions' ) );
						add_action( 'profile_update', array( &$this, 'profileUpdate' ) );
						register_activation_hook( __FILE__, array( &$this, 'activatePlugin' ) );
						
        }
				
				add_filter( 'mce_buttons', array(&$this, 'bxpand_tinymce' ) );
				add_filter( 'mce_buttons_2', array(&$this, 'bxpand_tinymce_2' ) );
    }

		
   /**
     * Run when plugin is activated
     *
     * @author Thomas McGregor
     * @since 0.9
     *
     * @param void
     * @return null
     */
    function activatePlugin()
    {
        add_option('tinymce_options', $this->toolbar_options );
		}

   /**
     * Initiate admin
     *
     * @author Thomas McGregor
     * @since 0.9
     *
     * @param void
     * @return null
     */
    function adminInit()
    {
        wp_enqueue_script( 'jquery' );
				wp_enqueue_style('tinymce_css', get_option('siteurl') . "/wp-includes/js/tinymce/themes/advanced/skins/wp_theme/ui.css?ver=" . (int) rand(0, 100) );
        $this->message = '';
        if ( isset( $_POST['action'] ) ) {
            switch ( $_POST['action'] ) {
                case 'tinymce_options_save_global':
										$tinymce_options = $this->toolbar_options;
										
										foreach( $this->toolbar_options['toolbar_1'] as $option => $status ) {
												if( !isset( $_POST['tinymce_options_toolbar_1'][$option] ) ) {
														$tinymce_options['toolbar_1'][$option] = 0;
												}
										}
										
										foreach( $this->toolbar_options['toolbar_2'] as $option => $status ) {
												if( !isset( $_POST['tinymce_options_toolbar_2'][$option] ) ) {
														$tinymce_options['toolbar_2'][$option] = 0;
												}
										}
										
										update_option('tinymce_options', $tinymce_options );
										
										if ( isset( $_POST['doaction_save'] ) ) {
												$this->message .= '<p>Global TinyMCE Settings saved.</p>';
										}
                    break;
            }
        }
    }

   /**
     * Initiate admin menu
     *
     * @author Thomas McGregor
     * @since 0.9
     *
     * @param void
     * @return null
     */
    function adminMenu()
    {
        add_options_page( __( 'TinyMCE Options' ), __( 'TinyMCE Options' ), 'level_10', basename(__FILE__), array( &$this,'optionsPage' ) );
    }

    /**
     * Options page
     *
     * @author Thomas McGregor
     * @since 0.9
     *
     * @param void
     * @return null
     */
    function optionsPage()
    {
			$tinymce_options = get_option('tinymce_options');
?><div class='wrap'>
    <h2><?php _e( 'TinyMCE Options - Global Settings' ); ?></h2>
    <?php if ( !empty( $this->message ) ) { ?><div id="message" class="updated fade"><p><strong><?php _e( $this->message ); ?></strong></p></div><?php } ?>
		</div>
    <h3><?php _e( 'Instructions' ); ?></h3>
    <p><?php _e( "From the list below, select the TinyMCE buttons you wish to display when editing a post or page. These options will be used if a user doesn't have their own personal settings, or they have the 'Global Settings' option selected." ); ?></p>
		<p><?php _e( "To edit a particular user's TinyMCE settings go to <a href='users.php'>Authors &amp; Users</a> and click the edit link next to the repsective User." ); ?></p>
    <div>
				<form method="post">
            <?php wp_nonce_field( 'tinymce-options-nonce', 'tinymce-options-nonce', true, true ); ?>
            <input type="hidden" name="action" value="tinymce_options_save_global"/>
            <input type="hidden" name="tinymce-options-nonce" value="true"/>
			<?php $this->tinyMCEOptionsForm( $tinymce_options ); ?>
				<p class="submit" style="clear: both;"><input class="button-primary" type="submit" id="submit_changes" name="doaction_save" value="<?php _e( 'Save changes' ); ?>" /></p>
				</form>
    </div>
</div><?php
    }
		
		
		/**
     * Show filtered TinyMCE buttons for specified toolbar
     *
     * @author Thomas McGregor
     * @since 0.9
     *
     * @param $toolbar
     * @return array or string
     */
		function bxpand_tinymce_options($toolbar) {
				global $user_ID;
				
				$tinymce_options = get_usermeta( $user_ID, 'tinymce_options' );
				
				//$tinymce_options = get_option('tinymce_options');
				
				if( $tinymce_options == false ) {
					$tinymce_options = get_option( 'tinymce_options' );
				}elseif( $tinymce_options == 'global' ) {
					$tinymce_options = get_option( 'tinymce_options' );
				}
				
				$enabled_options = array();

				foreach(array_diff( $tinymce_options['toolbar_' . $toolbar], array('0') ) as $key => $value) {
						if( strstr( $key, "spacer-" ) === false ) {
								$enabled_options[] = $key;
						}
				}
				
				return ( sizeof( $enabled_options ) > 0 ? $enabled_options : '' );
		}
		
		/**
     * Show filtered TinyMCE buttons for first toolbar
     *
     * @author Thomas McGregor
     * @since 0.9
     *
     * @param void
     * @return array or string
     */
		function bxpand_tinymce() {
				return $this->bxpand_tinymce_options(1);
		}
		
		/**
     * Show filtered TinyMCE buttons for second toolbar
     *
     * @author Thomas McGregor
     * @since 0.9
     *
     * @param void
     * @return array or string
     */
		function bxpand_tinymce_2() {
				return $this->bxpand_tinymce_options(2);
		}
		
		/**
     * TinyMCE Options Table
     *
     * @author Thomas McGregor
     * @since 1.0
     *
     * @param void
     * @return array or string
     */
		function tinyMCEOptionsForm( $tinymce_options ) { 
				$tinymce_options = ( $tinymce_options == 'global' || $tinymce_options == false  ? get_option('tinymce_options') : $tinymce_options );
				$icon_style = "background-image: url(../wp-includes/js/tinymce/themes/advanced/img/%s); display: block; height: 20px; width: 20px;";
		?>
						<div style="float: left; width: 250px;" class="tinymce-options wp_themeSkin">
            <table class="form-table">
                <tbody id="options_toolbar_1_list">
                    <tr>
                        <td align="left" colspan="2">
                            <h3><?php _e( 'Toolbar 1' ); ?></h3>
                        </td>
                    </tr>
                    <tr valign="top">
												<td align="left">
<?php 							foreach ( $tinymce_options['toolbar_1'] as $option => $status ) { 
												if( strstr( $option, "spacer-" ) === false ) { ?>
														<table cellpadding="0" cellspacing="0" width="100%">
																<tr>
																		<td width="25px"><input type="checkbox" name="tinymce_options_toolbar_1[<?php echo $option; ?>]" value="1"<?php echo ($status == 1 ? ' checked="checked"' : ''); ?> id="tinymce_options_toolbar_1[<?php echo $option; ?>]" class="tinymce-option" /></td>
																		<td width="25px"><span style="<?php echo sprintf($icon_style, (isset($this->toolbar_options_render[$option]['display']) && $this->toolbar_options_render[$option]['display'] == none ? '' : 'icons.gif')); ?>" class="<?php echo $this->toolbar_options_render[$option]['class']; ?>"></span></td>
																		<td><label for="tinymce_options_toolbar_1[<?php echo $option; ?>]"><?php echo $this->toolbar_options_render[$option]['text']; ?></label></td>
																</tr>
														</table>
<?php 									}
												else { ?>
														<input type="hidden" name="tinymce_options_toolbar_1[<?php echo $option; ?>]" value="1" />
<?php										}
										} ?>
												</td>
										</tr>
                </tbody>
            </table>
						</div>
						<div style="float: left; width: 250px;" class="tinymce-options wp_themeSkin">
            <table class="form-table">
                <tbody id="options_toolbar_2_list">
                    <tr>
                        <td align="left" colspan="2">
                            <h3><?php _e( 'Toolbar 2' ); ?></h3>
                        </td>
                    </tr>
										 <tr valign="top">
												<td align="left">
<?php 							foreach ( $tinymce_options['toolbar_2'] as $option => $status ) { 
												if( strstr( $option, "spacer-" ) === false ) { ?>
														<table cellpadding="0" cellspacing="0" width="100%">
																<tr>
																		<td width="25px"><input type="checkbox" name="tinymce_options_toolbar_2[<?php echo $option; ?>]" value="1"<?php echo ($status == 1 ? ' checked="checked"' : ''); ?> id="tinymce_options_toolbar_1[<?php echo $option; ?>]" class="tinymce-option" /></td>
																		<td width="25px"><span style="<?php echo sprintf($icon_style, (isset($this->toolbar_options_render[$option]['display']) && $this->toolbar_options_render[$option]['display'] == none ? '' : 'icons.gif')); ?>" class="<?php echo $this->toolbar_options_render[$option]['class']; ?>"></span></td>
																		<td><label for="tinymce_options_toolbar_2[<?php echo $option; ?>]"><?php echo $this->toolbar_options_render[$option]['text']; ?></label></td>
																</tr>
														</table>
<?php 									}
												else { ?>
														<input type="hidden" name="tinymce_options_toolbar_2[<?php echo $option; ?>]" value="1" />
<?php										}
										} ?>
												</td>
										</tr>
                </tbody>
            </table>
						</div>
						<?php
		}
	
		
		/**
     * Add TinyMCE Options Box to Personal Profile Page
     *
     * @author Thomas McGregor
     * @since 1.0
     *
     * @param void
     * @return null
     */
		function personalTinyMCEOptions() {
				global $user_id;
				$tinymce_options = get_usermeta( $user_id, 'tinymce_options' ); ?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						if(jQuery('#tinymce_options_global').is(':checked')) {
							jQuery('.tinymce-option').attr("disabled", true);
						}
						
						jQuery('#tinymce_options_global').click(function() {
							if(jQuery('#tinymce_options_global').is(':checked')) {
								jQuery('.tinymce-option').attr("disabled", true);
							}
							else {
								jQuery('.tinymce-option').attr("disabled", false);
							}
						});
					});
				</script>
				<h3><?php _e( 'TinyMCE Options' ); ?></h3>
				<input type="hidden" name="save_tinymce_user_options" value="<?php echo $user_id; ?>" />
				<table class="form-table">
            <tbody>
							<tr>
									<th scope="row">Global Settings
											
									</th>
									<td>
											<input type="checkbox" name="tinymce_options_global" value="true"<?php echo ($tinymce_options == 'global' ? ' checked="checked"' : ''); ?> id="tinymce_options_global" />&nbsp;<label for"tinymce_options"><?php _e( 'Use the Global Settings' ); ?></label>
											<p><strong><?php _e( 'Note: ' ); ?></strong><?php _e( "Selecting this option will override any of the User Settings selected below" ); ?></p>
									</td>
							</tr>
							<tr class="tinymce-options-user">
									<th scope="row">User Settings
											
									</th>
									<td>
											<?php	$this->tinyMCEOptionsForm( $tinymce_options ); ?>
									</td>
							</tr>
						</tbody>
				</table>
<?php
		}
		
		/**
     * Update a user's TinyMCE Options
     *
     * @author Thomas McGregor
     * @since 1.0
     *
     * @param void
     * @return null
     */
		function profileUpdate() {
				global $user_id;
				
				if( isset( $_POST['save_tinymce_user_options'] ) ) {
				
						if( isset( $_POST['tinymce_options_global'] ) && $_POST['tinymce_options_global'] == 'true' ) {
								$tinymce_options = 'global';
						}
						else {
								$tinymce_options = $this->toolbar_options;
														
								foreach( $this->toolbar_options['toolbar_1'] as $option => $status ) {
										if( !isset( $_POST['tinymce_options_toolbar_1'][$option] ) ) {
												$tinymce_options['toolbar_1'][$option] = 0;
										}
								}
								
								foreach( $this->toolbar_options['toolbar_2'] as $option => $status ) {
										if( !isset( $_POST['tinymce_options_toolbar_2'][$option] ) ) {
												$tinymce_options['toolbar_2'][$option] = 0;
										}
								}
						
						}
						
						update_usermeta( $user_id, 'tinymce_options', $tinymce_options );
				}
		}
}

new TinyMCE_Options; ?>