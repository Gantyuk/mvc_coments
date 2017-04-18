<?php
/**
 * Created by PhpStorm.
 * User: Vgant
 * Date: 15.04.2017
 * Time: 22:00
 */

namespace app\models;

use vender\core\DB;

class Coments extends DB
{
    protected $_user_id;
    protected $_parent_id;
    protected $_text;

    public function __construct()
    {
        $this->mysql_conect = DB::instanse();
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->_text;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->_parent_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->_user_id;
    }

    /**
     * @param mixed $parent_id
     */
    public function setParentId($parent_id)
    {
        $this->_parent_id = $parent_id;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->_text = $text;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->_user_id = $user_id;
    }

    public function Add()
    {
        $this->mysql_conect->_mysqli->query("
			INSERT INTO
				coments (user_id, parent_id, text)
			VALUES
				('" . $this->getUserId() . "', '" . $this->getParentId() . "', '" . $this->getText() . "')");
    }

    public function ShovAll()
    {
        return $this->mysql_conect->_mysqli->query("SELECT * FROM coments c 
                                INNER JOIN users u ON c.user_id = u.id");
    }

    public function ShowWherParentId($id)
    {
        return $this->mysql_conect->_mysqli->query("SELECT c.id, c.parent_id,c.text,u.Name,u.id AS user_id  FROM coments c INNER JOIN users u ON c.user_id = u.id WHERE c.parent_id = " . $id);
    }

    public function updae($id, $text)
    {
        $this->mysql_conect->_mysqli->query("UPDATE coments SET text=\"" . $text . "\" WHERE id =" . $id);
    }

    public function delet($id)
    {
        $this->mysql_conect->_mysqli->query("DELETE FROM `coments` WHERE id = " . $id);
    }
}