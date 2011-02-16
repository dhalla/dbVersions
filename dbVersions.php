<?php

    require_once('dbVersions.localconf.php');
    require_once('dbVersions.globalconf.php');
    require_once('dbVersions.class.php');

    if (php_sapi_name() != 'cli') {    
        print("Please use the CLI for dbVersions.\n");
        die();    
    }; 
    
    if (version_compare(PHP_VERSION, '5.3') <= 0) {
        print("Warning: PHP".PHP_VERSION." installed, longopts not supported. See also http://www.php.net/manual/en/function.getopt.php");
    } 
    
    /**
     * Options:
     * -a --action 'import' or 'export'
     * -h --help display help
     */
    $options = getopt(ah)
    
    $db = new dbVersion(array(
        'user'      => DATABASE_USER,
        'passwd'    => DATABASE_PASSWD,
        'dbname'    => DATABASE_DBNAME,
        'action'    => 'export'        
    ));
    
    
    echo($db);


