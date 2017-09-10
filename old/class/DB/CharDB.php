<?php
/**
 * Class for conection to DB for Char php class.
 *
 * @author @rokimoki
 */
include_once('Conection.php');
class CharDB {
    public static function countOnlinePlayers() {
        $conector = new Conection($GLOBALS['mysql_settings']['host'], $GLOBALS['mysql_settings']['db']);
        try
        {
            $con = $conector->connect();
            $con->exec('SET CHARACTER SET utf8');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $con->query("SELECT COUNT(char_id) AS players_online FROM `char` WHERE online > 0;");
            $conector = null;
            $con = null;
            return $consulta;
        }
        catch (Exception $e)
        {
            $conector = null;
            $con = null;
            throw $e;
        }
    }
}

