<?php
/**
 * Class for conection to DB for Login php class.
 *
 * @author @rokimoki
 */
include_once('Conection.php');
class LoginDB {
    public static function createAccount($login, $email, $password, $birthdate, $sex) {
        $conector = new Conection($GLOBALS['mysql_settings']['host'], $GLOBALS['mysql_settings']['db']);
        try
        {
            $con = $conector->connect();
            $con->exec("SET CHARACTER SET utf8");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $con->prepare("INSERT INTO `login` 
                                                    (`userid`, 
                                                     `user_pass`, 
                                                     `sex`, 
                                                     `email`, 
                                                     `group_id`, 
                                                     `birthdate`) 
                                        VALUES      (:userid, 
                                                     :user_pass, 
                                                     :sex, 
                                                     :email, 
                                                     :group_id, 
                                                     :birthdate);");
            $consulta->bindParam(':userid', $login, PDO::PARAM_STR);
			$passwordHashed = $GLOBALS['cp_settings']['useMD5'] ? md5($password) : $password;
            $consulta->bindParam(':user_pass', $passwordHashed, PDO::PARAM_STR);
            $consulta->bindParam(':sex', $sex, PDO::PARAM_STR);
            $consulta->bindParam(':email', $email, PDO::PARAM_STR);
			$gpid = 0;
            $consulta->bindParam(':group_id', $gpid, PDO::PARAM_INT);
            $consulta->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
            $consulta->execute();
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
	
    public static function loginExist($userid) {
        $conector = new Conection($GLOBALS['mysql_settings']['host'], $GLOBALS['mysql_settings']['db']);
        try
        {
            $con = $conector->connect();
            $con->exec("SET CHARACTER SET utf8");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $con->prepare("SELECT `account_id` FROM `login` WHERE userid = :userid;");
            $consulta->bindParam(':userid', $userid, PDO::PARAM_STR);
            $consulta->execute();
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
