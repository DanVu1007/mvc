<?php

namespace mvc\Models\login;

use mvc\Models\login\LoginResourceModel;

class LoginRepository
{
    private $resourceModel;
    public function __construct()
    {
        $this->resourceModel = new LoginResourceModel;
    }

    public function login($name)
    {
        return $this->resourceModel->getLogin($name);
    }
}
