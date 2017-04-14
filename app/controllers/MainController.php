<?php

namespace app\controllers;

use app\models\Users;
use vender\core\base\Controller;

class MainController extends Controller
{
    public function index()
    {
        $this->getView();
    }

    public function autor()
    {
        $this->getView();
    }

    public function registration()
    {
        $data = $_POST;
        if (isset($data['do_singup'])) {
            $errors = array();
            if (trim($data['name']) == '') {
                $errors[] = 'Введіть і\'мя';
            }
            if (trim($data['email']) == '') {
                $errors[] = 'Введіть Email';
            }
            if ($data['password'] == '') {
                $errors[] = 'Введіть Пароль';
            }
            if ($data['password'] != $_POST['password_repeat']) {
                $errors[] = 'Повторний пароль введено не вірно';
            }
            if (empty($errors)) {
                $user = new Users();
                $user->setName($data['name']);
                $user->setEmail($data['email']);
                $user->setPassword($data['password']);
                $user->Add();
            } else {
                $this->setVars(compact("errors", "data"));
            }
        }
        $this->getView();
    }

    public function login()
    {
        $data = $_POST;
        if (isset($data['do_login'])) {
            $errors = array();
            $user = new Users();
            $atorization_user = $user->_mysql->Query("SELECT * FROM users WHERE Email = '" . $data['email'] . "'");
            if (empty($atorization_user)) {
                $errors[] = "Не вірний Емайл";
            } else {
                if (password_verify($data['password'], $atorization_user[0]['Password'])) {
                    $_SESSION["User_login"] = $atorization_user[0];
                    header('Location: /mvc_autorization/');
                    exit();
                } else {
                    $errors[] = "Не вірний пароль";
                }
            }
            $this->setVars(compact("errors", "data"));
        }
        $this->getView();
    }
    public function logout(){
        unset($_SESSION['User_login']);
        header('Location: /mvc_autorization/');
    }
}

?>
