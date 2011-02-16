<?php

/**
 * Todo: Logging, Error-Level, CLI-Check...
 *
 *
 */
    class dbVersion {

        private $cmd;            

        public function __construct(array $params) {    
            
            $action = ($params['mysql'] == 'export') 
                ? array('cmd' => 'mysqldump', "readwrite" => ">") 
                : array('cmd' => 'mysql', "readwrite" => "<"); 

            $this->cmd = $action['cmd']." -u ".$params['user']." -p".$params['passwd']." ".$params['dbname']." ".$action['readwrite']." ";

        }
        
        public function __toString() {
            return $this->cmd;
        }
    
    }

