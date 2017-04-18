<?php
/**
 * Created by PhpStorm.
 * User: Vgant
 * Date: 14.04.2017
 * Time: 21:36
 */

namespace app\models;

use vender\core\DB;


class Users extends DB
{
    protected $_id;
    protected $_Email;
    protected $_Name;
    protected $_password;

    public function __construct()
    {
        $this->mysql_conect = DB::instanse();
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_Email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_Name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->_Email = $Email;
    }

    /**
     * @param mixed $id
     */

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->_Name = $Name;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = password_hash($password,PASSWORD_DEFAULT);
    }

    /**
     *
     */
    public function Add()
    {
        $this->mysql_conect->_mysqli->query("
			INSERT INTO
				users (Name, Email, Password)
			VALUES
				('" . $this->getName() . "', '" . $this->getEmail() . "', '" . $this->getPassword() . "')");
    }
}