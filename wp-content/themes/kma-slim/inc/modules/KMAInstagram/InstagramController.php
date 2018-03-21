<?php

namespace Includes\Modules\KMAInstagram;

use Includes\Modules\KMAInstagram\Instagram;

class InstagramController
{
    protected $callbackURI;
    protected $clientSecret;
    protected $clientID;
    protected $userID;
    protected $accessToken;

    public function __construct()
    {
        $this->callbackURI = get_site_url() . '/wp-admin/admin.php?page=kma-instagram';
        $this->clientSecret = '9bec48c277c34db7a1e5c24490cf332e';
        $this->clientID = '50387f6b46ad4cf59b986e0108625313';
        $this->userID = get_option('instagram_page_id');
        $this->accessToken = get_option('instagram_token');
    }

    protected function initialize(){
        $instagram = new Instagram([
            'apiKey'      => $this->clientID,
            'apiSecret'   => $this->clientSecret,
            'apiCallback' => $this->callbackURI
        ]);
        if($this->accessToken != ''){
            $instagram->setAccessToken($this->accessToken);
        }
        return $instagram;
    }

    public function getLikes($num = 1)
    {
        $instagram = $this->initialize();
        $likes = $instagram->getUserLikes($num);

        return $likes;
    }

    public function getFeed($num = 1)
    {
        $instagram = $this->initialize();
        return $instagram->getUserMedia($this->userID, $num);
    }

    public function showLoginButton()
    {
        $instagram = $this->initialize();
        $this->acceptCallback();
        return '<a class="button is-info" href="' . $instagram->getLoginUrl(['basic','likes']) . '&scope=public_content" >Get Access Token</a> ';
    }

    public function acceptCallback()
    {
        $instagram = $this->initialize();
        $code = (isset($_GET['code']) ? $instagram->getOAuthToken($_GET['code']) : '');

        update_option('instagram_page_id',
            isset($code->user->id) ? sanitize_text_field($code->user->id) : $this->userID);
        update_option('instagram_token',
            isset($code->access_token) ? sanitize_text_field($code->access_token) : $this->accessToken);
    }

    public function setupAdmin()
    {
        add_action('admin_menu', function(){
            $this->addMenus();
        });
    }

    protected function loadCss()
    {
        wp_enqueue_style('bluma_admin_css', 'https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css',false, '1.0.0');
    }

    public function addMenus()
    {
        add_menu_page("Instagram Settings", "Instagram Settings", "administrator", 'kma-instagram', function () {
            $this->loadCss();
            include(wp_normalize_path( dirname(__FILE__) . '/templates/AdminOverview.php'));
        }, "dashicons-admin-generic");
    }


}
