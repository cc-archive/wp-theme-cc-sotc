<?php
use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\WP_Editor;
use Queulat\Forms\Element\Input_Url;


class Highlights_Metabox extends Metabox
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
                        'description' => 'Highlight content, you can use "Read more" tag in case you need it',
                        'media_buttons' => false,
                        'drag_drop_upload' => false,
                        'textarea_rows' => 5
                    ]
                ]
            ),
            Node_Factory::make(
                Input_url::class,
                [
                    'name' => 'url',
                    'label' => 'External link',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'properties' => [
                        'description' => 'Place here the external link'
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
                case 'url':
                    $sanitized[$key] = esc_url_raw($val);
                    break;
            }
        }
        return $sanitized;
    }
}

new Highlights_Metabox('highlights', 'Highlights data', 'sotc_highlight', ['context' => 'normal']);