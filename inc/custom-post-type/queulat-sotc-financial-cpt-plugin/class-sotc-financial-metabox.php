<?php
use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\Textarea;

class Financial_Metabox extends Metabox
{
    public function __construct($id = '', $title = '', $post_type = '', array $args = array()) {
        parent::__construct($id, $title, $post_type, $args);
    }
    
    public function get_fields() : array
    {
        return [
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
                case 'embed_code':
					$sanitized[ $key ] = $val;
					break;
            }
        }
        return $sanitized;
    }
}

new Financial_Metabox('financial', 'Financial data', 'sotc_financial', ['context' => 'normal']);