<?php

/**
 * Todo: Logging, Error-Level, CLI-Check...
 *
 *
 */
    class dbVersion {

        private $cmd;  

        /**
         * Constructor
         *
         */
        public function __construct(array $params) {    
            
            $action = ($params['action'] == 'export') 
                ? array('cmd' => 'mysqldump', "readwrite" => ">") 
                : array('cmd' => 'mysql', "readwrite" => "<"); 

            $this->cmd = $action['cmd']
                        ." -u".$params['user']
                        ." -p".$params['passwd']." ###options### "
                        .$params['dbname']." "
                        .$action['readwrite']." "
                        .$this->getExportPath();
            
        }
        
        
        /**
         * Return Path for File-Export
         *
         */
        private function getExportPath() {
            
            $dir = "./db_exports/";
            $filename = date('Ymd-His').'_dump_'.DATABASE_DBNAME.'.sql';
            
            return $dir.$filename;
            
        }        
        
        
        
        /** 
         * Return current DB-Command
         *
         */
        public function __toString() {
            return $this->cmd;
        }
    
    }

