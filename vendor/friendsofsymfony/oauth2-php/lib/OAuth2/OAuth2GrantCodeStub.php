<?php

namespace OAuth2;

use OAuth2\Model\IOAuth2Client;
use OAuth2\Model\OAuth2AuthCode;

class OAuth2GrantCodeStub extends OAuth2StorageStub implements IOAuth2GrantCode {
    private $authCodes;

    public function getAuthCode($code) {
        if (isset($this->authCodes[$code])) {
            return $this->authCodes[$code];
        }
    }

    public function getAuthCodes() {
        return $this->authCodes;
    }

    public function getLastAuthCode() {
        return end($this->authCodes);
    }

    public function createAuthCode($code, IOAuth2Client $client, $data, $redirect_uri, $expires, $scope = NULL) {
        $token = new OAuth2AuthCode($client->getPublicId(), $code, $expires, $scope, $data, $redirect_uri);
        $this->authCodes[$code] = $token;
    }

    public function markAuthCodeAsUsed($code) {
        if(isset($this->authCodes[$code])) {
            unset($this->authCodes[$code]);
        }
    }

}


