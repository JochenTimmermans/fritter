<?php

namespace fritter\users;

use freest\db\DBC;

/**
 * Description of User
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class User {
    
    private $id;
    private $email;
    private $password;
    private $username;
    private $created;
    
    public function __construct($user_id) 
    {
        $dbc = new DBC();
        $sql = "SELECT email,password,username,created 
              FROM users 
              WHERE id = '$user_id';";
        $q = $dbc->query($sql) or new Error(__FILE__,$dbc->error());
        $row = $q->fetch_assoc();
        $this->id       = $user_id;
        $this->email    = $row['email'];
        $this->password = $row['password'];
        $this->username = $row['username'];
        $this->created  = $row['created'];
    }
    
    // getters
    public function id()       { return $this->id;       }
    public function email()    { return $this->email;    }
    public function password() { return $this->password; }
    public function username() { return $this->username; }
    public function created()  { return $this->created;  }
    
}
