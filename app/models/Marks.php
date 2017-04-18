<?php
/**
 * Created by PhpStorm.
 * User: Vgant
 * Date: 18.04.2017
 * Time: 20:28
 */

namespace app\models;


use vender\core\DB;

class Marks extends DB
{
    protected $_user_id;
    protected $_coment_id;
    protected $_mark;

    public function __construct()
    {
        $this->mysql_conect = DB::instanse();
    }

    /**
     * @param mixed $coment_id
     */
    public function setComentId($coment_id)
    {
        $this->_coment_id = $coment_id;
    }

    /**
     * @param mixed $mark
     */
    public function setMark($mark)
    {
        $this->_mark = $mark;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->_user_id;
    }

    /**
     * @return mixed
     */
    public function getComentId()
    {
        return $this->_coment_id;
    }

    /**
     * @return mixed
     */
    public function getMark()
    {
        return $this->_mark;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->_user_id = $user_id;
    }

    public function updae($iduser, $idcoment, $mark)
    {
        $this->mysql_conect->_mysqli->query("UPDATE `marks` SET `mark`=" . $mark . " WHERE user_id = " . $iduser . " AND coment_id = " . $idcoment);
    }

    public function Add()
    {
        $this->mysql_conect->_mysqli->query("
			INSERT INTO
				marks (user_id, coment_id, mark)
			VALUES
				('" . $this->getUserId() . "', '" . $this->getComentId() . "', '" . $this->getMark() . "')");
    }

    public function ifs($iduser, $idcoment)
    {
        return $this->mysql_conect->_mysqli->query("SELECT * FROM marks WHERE user_id = " . $iduser . " AND coment_id = " . $idcoment);
    }


}