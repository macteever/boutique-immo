<?php 
if(!function_exists('sync_acf_and_ac3_live')) {
    require get_template_directory().'/biens/Biens_controller.php';
    require get_template_directory().'/helpers/handle_and_save_xml.php';

    function sync_acf_and_ac3_live() {
        store_xml_data();
    }
}else{
    sync_acf_and_ac3_live();
}

add_action( 'ac3_acf_sync', 'sync_acf_and_ac3_live', 10, 0 );