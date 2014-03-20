<?php

namespace OAuth2;

use OAuth2\Model\IOAuth2Client;

class OAuth2GrantUserStub extends OAuth2StorageStub implements IOAuth2GrantUser {
    private $users;

    public function addUser($username, $password, $scope = null, $data = null) {
        $this->users[$username] = array(
            'password' => $password,
            'scope' => $scope,
            'data' => $data,
        );
    }

    public function checkUserCredentials(IOAuth2Client $client, $username, $password) {
        if (!isset($this->users[$username])) {
            return false;
        }
        if ($this->users[$username]['password'] === $password) {
            return array(
                'scope' => $this->users[$username]['scope'],
                'data' => $this->users[$username]['data'],
            );
        }
        return false;
    }
}

