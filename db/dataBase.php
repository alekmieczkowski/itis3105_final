<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 9/29/2017
 * Time: 5:38 PM
 */

class db{
    protected $dsn='mysql:host=localhost;dbname=summer_camp';
    protected $username='root';
    protected $password='';

    private $_db;
    private $_instance;

    public static function getInstance()
    {
        static $instance = null;

        if (is_null($instance)) {
            $instance = new db();
        }

        return $instance;
    }

    public function __construct() {
        $this->_db = new PDO($this->dsn, $this->username, $this->password);
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql) {
        return $this->_db->query($sql);
    }

    public function prepare($sql){
        return $this->_db->prepare($sql);
    }

    
}

?>

