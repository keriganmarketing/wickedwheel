<?php

namespace Includes\Modules\KMAInstagram;

class Instagram
{

    /**
     * The API base URL
     */
    const API_URL = 'https://api.instagram.com/v1/';

    /**
     * The API OAuth URL
     */
    const API_OAUTH_URL = 'https://api.instagram.com/oauth/authorize';

    /**
     * The OAuth token URL
     */
    const API_OAUTH_TOKEN_URL = 'https://api.instagram.com/oauth/access_token';

    /**
     * The Instagram API Key
     * @var string
     */
    private $_apikey;

    /**
     * The Instagram OAuth API secret
     * @var string
     */
    private $_apisecret;

    /**
     * The callback URL
     * @var string
     */
    private $_callbackurl;

    /**
     * The user access token
     * @var string
     */
    private $_accesstoken;

    /**
     * Whether a signed header should be used
     * @var boolean
     */
    private $_signedheader = false;

    /**
     * Available scopes
     * @var array
     */
    private $_scopes = array('basic', 'likes', 'comments', 'relationships');

    /**
     * Available actions
     * @var array
     */
    private $_actions = array('follow', 'unfollow', 'block', 'unblock', 'approve', 'deny');

    /**
     * Default constructor
     * @param array|string $config Instagram configuration data
     * @return void
     */
    public function __construct($config)
    {
        if (true === is_array($config)) {
            // if you want to access user data
            $this->setApiKey($config['apiKey']);
            $this->setApiSecret($config['apiSecret']);
            $this->setApiCallback($config['apiCallback']);
        } elseif (true === is_string($config)) {
            // if you only want to access public data
            $this->setApiKey($config);
        } else {
            throw new \Exception("Error: __construct() - Configuration data is missing.");
        }
    }

    /**
     * Generates the OAuth login URL
     * @param array [optional] $scope Requesting additional permissions
     * @return string Instagram OAuth login URL
     */
    public function getLoginUrl($scope = array('basic'))
    {
        if (is_array($scope) && count(array_intersect($scope, $this->_scopes)) === count($scope)) {
            return self::API_OAUTH_URL . '?client_id=' . $this->getApiKey() . '&redirect_uri=' . urlencode($this->getApiCallback()) . '&scope=' . implode('+',
                    $scope) . '&response_type=code';
        } else {
            throw new \Exception("Error: getLoginUrl() - The parameter isn't an array or invalid scope permissions used.");
        }
    }

    /**
     * Get the OAuth data of a user by the returned callback code
     * @param string $code OAuth2 code variable (after a successful login)
     * @param boolean [optional] $token If it's true, only the access token will be returned
     * @return mixed
     */
    public function getOAuthToken($code, $token = false) {
        $apiData = array(
            'grant_type'      => 'authorization_code',
            'client_id'       => $this->getApiKey(),
            'client_secret'   => $this->getApiSecret(),
            'redirect_uri'    => $this->getApiCallback(),
            'code'            => $code
        );

        $result = $this->_makeOAuthCall($apiData);
        return (false === $token) ? $result : $result->access_token;
    }
    /**
     * Access Token Getter
     *
     * @return string
     */
    public function getAccessToken() {
        return $this->_accesstoken;
    }

    /**
     * API-key Setter
     *
     * @param string $apiKey
     * @return void
     */
    public function setApiKey($apiKey) {
        $this->_apikey = $apiKey;
    }

    /**
     * API Key Getter
     *
     * @return string
     */
    public function getApiKey() {
        return $this->_apikey;
    }

    /**
     * API Secret Setter
     *
     * @param string $apiSecret
     * @return void
     */
    public function setApiSecret($apiSecret) {
        $this->_apisecret = $apiSecret;
    }

    /**
     * API Secret Getter
     *
     * @return string
     */
    public function getApiSecret() {
        return $this->_apisecret;
    }

    /**
     * API Callback URL Setter
     *
     * @param string $apiCallback
     * @return void
     */
    public function setApiCallback($apiCallback) {
        $this->_callbackurl = $apiCallback;
    }

    /**
     * API Callback URL Getter
     *
     * @return string
     */
    public function getApiCallback() {
        return $this->_callbackurl;
    }

    /**
     * Access Token Setter
     *
     * @param object|string $data
     * @return void
     */
    public function setAccessToken($data) {
        (true === is_object($data)) ? $token = $data->access_token : $token = $data;
        $this->_accesstoken = $token;
    }

}