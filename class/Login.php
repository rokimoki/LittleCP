<?php
/**
 * Class description for Login object.
 *
 * @author @rokimoki
 */
include_once('DB/LoginDB.php');
class Login {
    private $account_id, $userid, $user_pass, $sex, $email, $group_id, $state,
            $unban_time, $expiration_time, $logincount, $lastlogin, $last_ip,
            $birthdate, $character_slots, $pincode, $pincode_change;
    
    public function __construct($account_id = "", $userid = "",
            $user_pass = "", $sex = "", $email = "", $group_id = "",
            $state = "", $unban_time = "", $expiration_time = "",
            $logincount = "", $lastlogin = "", $last_ip = "", $birthdate = "",
            $character_slots = "", $pincode = "", $pincode_change = "") {
        $this->account_id = $account_id;
        $this->userid = $userid;
        $this->user_pass = $user_pass;
        $this->sex = $sex;
        $this->email = $email;
        $this->group_id = $group_id;
        $this->state = $state;
        $this->unban_time = $unban_time;
        $this->expiration_time = $expiration_time;
        $this->logincount = $logincount;
        $this->lastlogin = $lastlogin;
        $this->last_ip = $last_ip;
        $this->birthdate = $birthdate;
        $this->character_slots = $character_slots;
        $this->pincode = $pincode;
        $this->pincode_change = $pincode_change;
    }
    
    public function &__get($propiedad) {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
    }

    public function &__set($propiedad, $valor) {
        if (property_exists($this, $propiedad)) {
            $this->$propiedad = $valor;
        }
    }
    
    public function createAccount($login, $email, $password, $repassword, $birthdate, $sex) {
        if (strlen($login) < 3 && strlen($login) > 23) {
            throw new Exception ("Login can not be longer than 23 characters and must be longer than 3 characters.");
        }
        if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
            throw new Exception ("Login must be alphanumeric, without whitespaces or special characters.");
        }
        if (strlen($email) > 39) {
            throw new Exception ("The email can not be longer than 39 characters.");
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new Exception ("Please, provide a valid email.");
        }
        if (strcmp($password, $repassword) != 0) {
            throw new Exception ("Passwords must match!");
        }
        if (!$this->isValidDate($birthdate)) {
            throw new Exception ("Please, provide a valid date.");
        }
        if ($sex == 'M' || $sex == 'F') { // All valid
            LoginDB::createAccount($login, $email, $password, $birthdate, $sex);
        } else {
            throw new Exception("Please, provide a valid sex: male or female.");
        }
    }    
    
    private function isValidDate($birthdate) {
        $date = DateTime::createFromFormat('Y-m-d', $birthdate);
        return $date && $date->format('Y-m-d') === $birthdate;
    }
}
