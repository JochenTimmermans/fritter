<?php

namespace freest\error;

/**
 * Description of Error
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class Error2 {

    public function __construct($page, $error_msg) 
    {
        die("ERROR : ".$page." : ".$error_msg);
    }
    
    
    
}
