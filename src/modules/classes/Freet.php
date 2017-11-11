<?php

namespace fritter\freets;

use freest\db\DBC;

/**
 * Description of Freet
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class Freet {

    private $id;
    private $uid;
    private $freet;
    private $created;
    
    public function __construct($freet_id)
    {
        $dbc = new DBC();
        $sql = "SELECT uid,freet,created 
                FROM freets 
                WHERE id = '$freet_id';";
        $q = $dbc->query($sql) or new Error(__FILE__,$dbc->error());
        $row = $q->fetch_assoc();
        $this->id       = $freet_id;
        $this->uid      = $row['uid'];
        $this->freet    = $row['freet'];
        $this->created  = $row['created'];
    }
    
    // getters
    public function id()      { return $this->id;       }
    public function uid()     { return $this->uid;      }
    public function freet()   { return $this->freet;    }
    public function created() { return $this->created;  }
    
}
