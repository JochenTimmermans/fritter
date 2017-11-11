<?php

namespace fritter\mvc\model;

use freest\db\DBC;

/**
 * Description of UserModel
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class UserModel {

    public static function isLoggedIn(): bool
    {
        if (isset($_SESSION['uid']) && is_numeric($_SESSION['uid']) && $_SESSION['uid'] > 0 && self::isValidUid($_SESSION['uid'])) {
            return true;
        }
        return false;
    }
    
    public static function isValidUid($uid): bool
    {
        $dbc = new DBC();
        $sql = "SELECT email FROM users WHERE id = '$uid';";
        $q = $dbc->query($sql) or new Error2(__FILE__,$dbc->error());
        return $q->num_rows > 0;
    }
    
    public static function loginformCheck(): array
    {
        if (filter_input(INPUT_POST,'loginform') == "go") {
            $email = filter_input(INPUT_POST,'lf_email');
            $password = filter_input(INPUT_POST,'lf_password');
            if (empty($email) || empty($password)) {
                return array('status' => 'warning', 'warning' => 'please fill in all fields');
            }
            $dbc = new DBC();
            $pwd_hash = hash('sha256',$password);
            $sql = "SELECT id FROM users WHERE email = '$email' AND password = '$pwd_hash';";
            $q = $dbc->query($sql) or new Error2(__FILE__."/loginformCheck", $dbc->error());
            if ($q->num_rows > 0) {
                $uid = $q->fetch_assoc()['id'];
                $_SESSION['uid'] = $uid;
                return array('status' => '1');
            }
            else {
                return array('status' => 'warning', 'warning' => 'Invalid Email/Password combination.');
            }
        }
        else {
            return array('status' => '0');
        }
    }
    
}
