<?php
/**
 * Plugin Name: xinyu
 * Description: CiviCRM integration for Caldera Forms, customized for xinyu project
 * Version: 0.1
 * Author: zhaofeng-shu33
 * Author URI: https://github.com/zhaofeng-shu33
 * Plugin URI: https://github.com/zhaofeng-shu33/xinyu
 */

/**
 * Define constants.
 *
 * @since 0.1
 */
define( 'XINYU_PATH', plugin_dir_url( __FILE__ ) );

function xinyu_register_hooks() {
    add_action( 'caldera_forms_autopopulate_types', 'xinyu_autopulate_fields_types');
    add_filter( 'caldera_forms_render_get_field', 'xinyu_autopopulate_fields_values', 20, 2);    
}

function xinyu_autopulate_fields_types(){
    echo "<option value=\"xinyu_cases\"{{#is auto_type value=\"xinyu_cases\"}} selected=\"selected\"{{/is}}>" . __( 'xinyu -- cases', 'caldera-forms-civicrm' ) . "</option>";
}
function xinyu_autopopulate_fields_values($field, $form){
    if ( ! empty( $field['config']['auto'] ) ) {
        if($field['config']['auto_type'] == "xinyu_cases"){
            $result = civicrm_api3( 'Case', 'get', [
                'sequential' => 1,
                'is_deleted' => 0,
                'return' => ["subject", "id"]
            ] ); 
            $index = 0;
            foreach($result['values'] as $case){
                $field['config']['option'][$index] = [
                    'value' => $case['id'],
                    'label' => $case['subject']
                ];
                $index += 1;
            }
        }
    }
    return $field;
}
civicrm_initialize();
xinyu_register_hooks();
