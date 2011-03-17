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

    // Options
    $helptext = "\nUsage: 
-a : mandatory, can be 'import' or 'export'
-d : dry-run, only display output
-h : display help
-c : path to local configuration file with database parameters, if not set dbVersions.localconf.php will be used\n\n";
    
    $shortopts  = "a:c::hd";
    $options = getopt($shortopts);
        
    $db = new dbVersion(array(
        'user'      => DATABASE_USER,
        'passwd'    => DATABASE_PASSWD,
        'dbname'    => DATABASE_DBNAME,
        'action'    => $options['a']
    ));
    
    // Show Help and exit (or use if mandatory parameter 'a' has not been set)   
    if (array_key_exists('h', $options) OR !array_key_exists('a', $options) ) {
        print $helptext;
        exit();
    }

    // Dry Run
    if (array_key_exists('d', $options))  {
        print "Dry-Run: \n". $db ."\n";    
    }
    
    
    
    
    


    
    

