<?php

namespace Video\Management\Admin;

class Meta_box {

    /**
     * Constructor function
     */
    public function __construct() {

        // add meta boxes hook
        add_action( 'add_meta_boxes', array( $this, 'rvm_add_meta_boxes' ) );

        // save meta data on video post type
        add_action('save_post_video', array($this, 'rvm_save_meta_data'), 20, 2);

    }

    public function rvm_add_meta_boxes(){
        
        /**
         * Register Vimeo Permalink meta box
         */
        add_meta_box(
            'rvm_vimeo_permalink',
            'Add Vimeo Video Link',
            array($this, 'rvm_vimeo_link_meta'),
            'video'
        );
    }

    public function rvm_vimeo_link_meta($post){
        $video_link = get_post_meta($post->ID, '_rvm_video_link', true);
       ?>
       <div>
            <div class="rvm_meta_data" style="display: flex; gap: 40px;">
                <p class="post-attributes-label-wrapper menu-order-label-wrapper"><label class="post-attributes-label" for="menu_order">Video Link</label></p>
                <input name="rvm_video_link" type="text" id="video_link" value="<?php echo $video_link ?>" style="width: 450px">
            </div>
       </div>

       <?php
    }

    public function rvm_save_meta_data($post_id, $post){
        if(isset($_POST['rvm_video_link'])){
            update_post_meta($post_id, '_rvm_video_link', sanitize_text_field($_POST['rvm_video_link']));
        }
    }
}