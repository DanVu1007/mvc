<?php

namespace mvc\Models\login;

use mvc\Core\ResourceModel;
use mvc\Models\login\LoginModel;

class LoginResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->__init('user', 'id', new LoginModel);
    }
}
