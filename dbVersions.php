<?php

    require_once('dbVersions.localconf.php');
    require_once('dbVersions.globalconf.php');
    require_once('dbVersions.class.php');

    // Change this to try-catch-finally
    if (php_sapi_name() != 'cli') {    
        print("Please use the CLI for dbVersions.\n");
        die();    
    }
    
    if (version_compare(PHP_VERSION, '5.3') <= 0) {
        print("Warning: PHP".PHP_VERSION." installed, longopts not supported. See also http://www.php.net/manual/en/function.getopt.php");
        die();
    } 
    
    /**
     * Options:
     * -a can be 'import' or 'export'
     * -h display help
     * -c path to local configuration file with database parameters
     */
    $shortopts  = "a:c::h";
    $options = getopt($shortopts);
        
    $db = new dbVersion(array(
        'user'      => DATABASE_USER,
        'passwd'    => DATABASE_PASSWD,
        'dbname'    => DATABASE_DBNAME,
        'action'    => $options['a']
    ));
    
    
    echo $db."\n";
    
    

