<?php

/**
 * Todo: Logging, Error-Level, CLI-Check...
 *
 *
 */
    class dbVersion {

        private $cmd;            

        public function __construct(array $params) {    
        
            $this->cmd = "mysql ";

        }
        
        public function __toString() {
            return $this->cmd;
        }
    
    }

