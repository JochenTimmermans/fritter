<?php

namespace fritter\follows;

use freest\db\DBC;

/**
 * Description of Follow
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class Follow {

    private $id;
    private $uid;
    private $followsUid;
    private $created;
    
    public function __construct($follow_id) 
    {
        $dbc = new DBC();
        $sql = "SELECT uid,follows_uid,created 
                FROM follows 
                WHERE id = '$follow_id';";
        $q = $dbc->query($sql) or new Error2(__FILE__,$dbc->error());
        $row = $q->fetch_assoc();
        $this->id           = $follow_id;
        $this->uid          = $row['uid'];
        $this->followsUid   = $row['follows_uid'];
        $this->created      = $row['created'];
    }
    
    public function id()         { return $this-id;          }
    public function uid()        { return $this->uid;        }
    public function followsUid() { return $this->followsUid; }
    public function created()    { return $this->created;    }
    
}
