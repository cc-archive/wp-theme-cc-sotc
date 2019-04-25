<?php
use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\WP_Editor;
use Queulat\Forms\Element\Input;
use Queulat\Forms\Element\Input_Number;
use Queulat\Forms\Element\Textarea;

class License_Metabox extends Metabox
{
    public function __construct($id = '', $title = '', $post_type = '', array $args = array()) {
        parent::__construct($id, $title, $post_type, $args);
    }
    
    public function get_fields() : array
    {
        return [
            Node_Factory::make(
                WP_Editor::class,
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Element content',
                        'media_buttons' => false,
                        'drag_drop_upload' => false,
                        'textarea_rows' => 5
                    ]
                ]
            ),
            Node_Factory::make(
                Input::class,
                [
                    'name' => 'number',
                    'label' => 'Number',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'The Number'
                    ]
                ]
            ),
            Node_Factory::make(
                Input::class,
                [
                    'name' => 'number_description',
                    'label' => 'Number Description',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Description below the number'
                    ]
                ]
            ),
            Node_Factory::make(
                Textarea::class,
                [
                    'name' => 'embed_code',
                    'label' => 'Chart embed code',
                    'attributes' => [
                        'class' => 'widefat',
                        'rows' => 5
                    ],
                    'properties' => [
                        'description' => 'Chart embed code. You can create your chart <a href="https://cloud.highcharts.com" target="_blank">here</a> and then paste the code in the field above'
                    ]
                ]
            )
        ];
    }
    public function sanitize_data(array $data) : array
    {
        //Delete stats transient to update the global chapter stats
        $sanitized = [];
        foreach ($data as $key => $val) {
            switch ($key) {
                case 'content':
                    $sanitized[$key] = wp_kses_post($val);
                    break;
                case 'number':
                    $sanitized[$key] = $val;
                    break;
                case 'number_description':
					$sanitized[ $key ] = sanitize_text_field( $val );
					break;
                case 'embed_code':
					$sanitized[ $key ] = $val;
					break;
            }
        }
        return $sanitized;
    }
}

new License_Metabox('license', 'Impact data', 'sotc_license', ['context' => 'normal']);