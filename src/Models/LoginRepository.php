<?php

namespace mvc\Models;

use mvc\Models\LoginResourceModel;

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
    public function logout($model)
    {
        return $this->resourceModel->save($model);
    }
}
