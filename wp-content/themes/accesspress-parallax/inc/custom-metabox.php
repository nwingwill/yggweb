<?php
/**
 * Functions for sidebar metabox
 *
 * @package AccessPress Parallax
 * @since 3.3
 */
 
add_action('add_meta_boxes', 'accesspress_parallax_layout_box');  
function accesspress_parallax_layout_box()
{   


    add_meta_box(
                 'accesspress_parallax_settings', // $id
                 __( 'Post Sidebar Layout', 'accesspress-parallax' ), // $title
                 'accesspress_parallax_page_settings_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

    add_meta_box(
                 'accesspress_parallax_settings', // $id
                 __( 'Post Sidebar Layout', 'accesspress-parallax' ), // $title
                 'accesspress_parallax_page_settings_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority

    

    
}


// Page Layout Meta Box Functionality

$accesspress_parallax_page_layouts = array(
       
        'nosidebar' => array(
                        'value' => 'nosidebar',
                        'label' => __( 'No sidebar', 'accesspress-parallax' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png',
                    ),
       
        'rightsidebar' => array(
                        'value'     => 'rightsidebar',
                        'label'     => __( 'Right Sidebar', 'accesspress-parallax' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png',
                    ) 
    );

/*---------Function for Page layout meta box----------------------------*/
function accesspress_parallax_page_settings_callback()
{
    global $post, $accesspress_parallax_page_layouts ;
    wp_nonce_field( basename( __FILE__ ), 'accesspress_parallax_settings_nonce' );
?>
    <table class="form-table">
        <tr>
        <td>
        <?php
            $i = 0;  
           foreach ( $accesspress_parallax_page_layouts as $field ) {  
           $accesspress_parallax_page_metalayouts = get_post_meta( $post->ID, 'accesspress_parallax_page_layouts', true ); 
         ?>            
            <div class="radio-image-wrapper slidercat" id="slider-<?php echo esc_attr($i); ?>" style="float:left; margin-right:30px;">
            <label class="description">
                <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
            <input type="radio" name="accesspress_parallax_page_layouts" value="<?php echo esc_attr($field['value']); ?>" <?php checked( $field['value'], 
                        $accesspress_parallax_page_metalayouts ); 

                        if( empty($accesspress_parallax_page_metalayouts) && $field['value']=='rightsidebar' )
                        { 
                            echo "checked='checked'"; 
                        } ?>/>
                &nbsp;<?php echo esc_html($field['label']); ?>
            </label>
            </div>
            <?php 
            $i++;
                } // end foreach 
            ?>
        </td>
        </tr>            
    </table>
<?php
}
/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
/*-------------------Save function for Page Setting-------------------------*/

function accesspress_parallax_save_page_settings( $post_id ) { 
    global $accesspress_parallax_page_layouts, $post; 
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'accesspress_parallax_settings_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ 'accesspress_parallax_settings_nonce' ] ) ), basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ( isset( $_POST['post_type'] ) && 'page' == sanitize_text_field( wp_unslash($_POST['post_type']) )) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }
    
    foreach ($accesspress_parallax_page_layouts as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'accesspress_parallax_page_layouts', true); 
        $new = isset( $_POST['accesspress_parallax_page_layouts'] ) ? sanitize_text_field( wp_unslash( $_POST['accesspress_parallax_page_layouts'] ) ) : '';
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'accesspress_parallax_page_layouts', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'accesspress_parallax_page_layouts', $old);  
        } 
     } // end foreach    
}
add_action('save_post', 'accesspress_parallax_save_page_settings');



