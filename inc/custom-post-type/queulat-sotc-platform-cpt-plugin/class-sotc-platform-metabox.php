<?php
use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\WP_Image;
use Queulat\Forms\Element\Input;

class Platform_Metabox extends Metabox
{
    public function __construct($id = '', $title = '', $post_type = '', array $args = array()) {
        parent::__construct($id, $title, $post_type, $args);
    }
    
    public function get_fields() : array
    {
        return [
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
                WP_Image::class,
                [
                    'name' => 'logo',
                    'label' => 'Platform logo',
                    'properties' => [
                        'description' => 'Logo will be automatically resized'
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
                case 'number':
                    $sanitized[$key] = $val;
                    break;
                case 'logo':
					$sanitized[ $key ] = $val;
					break;
            }
        }
        return $sanitized;
    }
}

new Platform_Metabox('platform', 'Impact data', 'sotc_platform', ['context' => 'normal']);