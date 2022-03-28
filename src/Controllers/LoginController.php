<?php

use mvc\Core\Controller;
use mvc\Models\LoginModel;
use mvc\Models\LoginRepository;

class LoginController extends Controller
{
    function login() {
        if(!empty($_POST['name'])){
            $loginRepository = new LoginRepository;
            $login = $loginRepository ->login($_POST['name']);
            if(!empty($login)){
                if($_POST['name'] == $login->getName() && $_POST['password'] == $login->getPassword()){
                    echo 'dang nhap thanh cong';
                    $_SESSION['checklogin'] = true;
                    header("Location: " . WEBROOT . "tasks/index");
                }else{
                    $d['mess'] = 'Mật khẩu không đúng';
                    $this->set($d);
                }
            }else{
                $d['mess'] = 'Tài khoản hoặc mật khẩu không đúng';
                $this->set($d);
            }
        }else{
            $d['mess'] = 'Xin nhập thông tin';
        }
        $this->render('login');
    }
        

    function logout(){
        unset($_SESSION['checklogin']);
        header("Location: " . WEBROOT . "login/login");
    }
}