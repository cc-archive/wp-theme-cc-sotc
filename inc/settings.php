<?php 
use Queulat\Forms\Element\Div;
use Queulat\Forms\Element\Form;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\WP_Nonce;
use Queulat\Forms\Element\WP_Editor;
use Queulat\Forms\Element\Input;
use Queulat\Forms\Element\Select;

class ThemeSettings
{
    private $flash;
    public $settings;
    public function __construct()
    {
        $this->init();
        $this->flash = array('updated' => __('Settings saved', 'cc-sotc'), 'error' => __('There was a problem saving your settings', 'cc-sotc'));
        $this->settings = get_option('site_theme_settings');
    }
    public function init()
    {
        add_action('admin_menu', array($this, 'addAdminMenu'));
        add_action('admin_init', array($this, 'saveSettings'));
    }
    public function addAdminMenu()
    {
        add_submenu_page('index.php', _x('Custom settings', 'site settings title', 'cc-sotc'), _x('Custom settings', 'site settings menu', 'cc-sotc'), 'edit_theme_options', 'cc-sotc-site-settings', array($this, 'adminMenuScreen'));
    }
    public function get_terms() {
        $reports = front::get_reports();
        $return = array( '' => 'Choose');
        foreach ($reports as $report) {
            $return[$report->ID] = $report->post_title;
        }
        return $return;
    }
    public function adminMenuScreen()
    {
        wp_enqueue_media();
        echo '<div class="wrap">';
        screen_icon('index');
        echo '<h2>' . _x('Custom Settings', 'site settings title', 'cc-sotc') . '</h2>';
        if (!empty($_GET['msg']) && isset($this->flash[$_GET['msg']])) :
            echo '<div class="updated">';
        echo '<p>' . $this->flash[$_GET['msg']] . '</p>';
        echo '</div>';
        endif;
        $data = get_option('site_theme_settings');
        echo '<h4>Front page settings</h4>';
        $form = Node_Factory::make(
                Form::class,
                [
                    'attributes' => [
                        'class' => 'form',
                        'id' => 'site-settings',
                        'method' => 'POST'
                    ],
                    'children' => [
                        Node_Factory::make(
                            WP_Editor::class,
                            [
                                'name' => 'footer-content',
                                'label' => 'Footer Content',
                                'value' => (!empty($data['footer-content'])) ? $data['footer-content'] : '',
                                'attributes' => [
                                    'class' => 'widefat'
                                ],
                                'properties' => [
                                    'description' => 'Element content',
                                    'media_buttons' => true,
                                    'drag_drop_upload' => false,
                                    'textarea_rows' => 5
                                ]
                            ]
                        ),
                        Node_Factory::make(
                            Select::class,
                            [
                                'name' => 'current-report',
                                'label' => 'Current report',
                                'value' => (!empty($data['current-report'])) ? $data['current-report'] : '',
                                'attributes' => [
                                    'class' => 'widefat'
                                ],
                                'options' => $this->get_terms()
                            ]
                        ),
                        Node_Factory::make(
                            WP_Nonce::class,
                            [
                                'properties' => [
                                    'name' => '_site_settings_nonce',
                                    'action' => 'update_site_settings'
                                ]
                            ]
                        ),
                        Node_Factory::make(
                            Input::class,
                            [
                                'value' => 'Submit',
                                'attributes' => [
                                    'type' => 'submit',
                                    'class' => 'button button-primary button-large'
                                ],
                            ]
                        ),
                        Node_Factory::make(
                            Input::class,
                            [
                                'name' => 'action',
                                'value' => 'update_site_settings',
                                'attributes' => [
                                    'type' => 'hidden'
                                ],
                            ]
                        )
                    ]
                ]  
            );
            echo $form;
    }
    public function saveSettings()
    {
        // echo '<pre>'; print_r($_POST); echo '</pre>';
        // die();
        if (empty($_POST['action'])) return;
        if ($_POST['action'] !== 'update_site_settings') return;
        if (!wp_verify_nonce($_POST['_site_settings_nonce'], 'update_site_settings')) wp_die(_x("You are not supposed to do that", 'site settings error', 'cc-sotc'));
        if (!current_user_can('edit_theme_options')) wp_die(_x("You are not allowed to edit this options", 'site settings error', 'cc-sotc'));
        $fields = array(
            'footer-content',
            'current-report'
        );
        $raw_post = stripslashes_deep($_POST);
        $data = array_intersect_key($raw_post, array_combine($fields, $fields));
        update_option('site_theme_settings', $data);
        wp_redirect(admin_url('admin.php?page=cc-sotc-site-settings&msg=updated', 303));
        exit;
    }
}
$_set = new ThemeSettings;

