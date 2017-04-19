<?php

namespace app\controllers;

use app\models\Coments;
use app\models\Marks;
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
                header('Location: /mvc_autorization/main/login');
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
            $atorization_user = $user->mysql_conect->Query("SELECT * FROM users WHERE Email = '" . $data['email'] . "'");
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

    public function logout()
    {
        unset($_SESSION['User_login']);
        header('Location: /mvc_autorization/');
    }

    public function coments()
    {
        if (isset($_SESSION['User_login'])) {
            $coment = new Coments();

            //to do
            if (isset($_GET['startFrom'])) {
                $startFrom = $_GET['startFrom'];
                $data = [];
                $data['coment'] = $coment->ShowWherParentId("0 LIMIT " . $startFrom . ", 3");
                print_r($data['coment']);
                echo json_encode($data);
            }
            //

            if (isset($_POST['mark']) && !empty($_POST['mark'])) {
                $mark = new Marks();
                $res = $mark->ifs($_POST['user_id'], $_POST['coment_id']);
                if (empty($res)) {
                    $mark->setUserId($_POST['user_id']);
                    $mark->setComentId($_POST['coment_id']);
                    $mark->setMark($_POST['mark']);
                    $mark->add();
                } else {
                    $mark->updae($_POST['user_id'], $_POST['coment_id'], $_POST['mark']);
                }


            }
            if (isset($_POST['text']) && !empty($_POST['text'])) {
                if ($_POST['chengy'] == -1) {
                    $coment->setParentId($_POST['parent_id']);
                    $coment->setText($_POST['text']);
                    $coment->setUserId($_SESSION["User_login"]['id']);
                    $coment->Add();
                } else
                    $coment->updae($_POST['chengy'], $_POST['text']);
            }
            //Видалення видаляти щось з БД погано адже там можуть бути звязки
            if (isset($_POST['delete']) && !empty($_POST['delete'])) {
                $coment->delet($_POST['delete']);
            }
            $coments = $coment->ShowWherParentId(0);
            $this->setVars(compact("coments"));
            $this->getView();
        } else {
            require_once APP."/views/layouts/ERROR.php";
        }
    }
}

?>
