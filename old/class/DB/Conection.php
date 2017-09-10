<?php
/**
 * Class for stablishing conection to DB through PDO driver
 *
 * @author @rokimoki
 */
class Conection {
    private $hostname, $database;

    public function __construct($server, $bd) {
        $this->hostname = $server;
        $this->database = $bd;
    }

    public function connect() {
        $str = "mysql:dbname=" . $this->database . ";host=" . $this->hostname . ";port=" . $GLOBALS['mysql_settings']['port'];
        if (!($con = new PDO($str, $GLOBALS['mysql_settings']['user'], $GLOBALS['mysql_settings']['password']))) {
            throw new Exception("Unable to connect database: " . $this->database . "");
        }
        return $con;
    }
}