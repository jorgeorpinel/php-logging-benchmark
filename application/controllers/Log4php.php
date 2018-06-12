<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'apache-log4php/vendor/autoload.php';

/**
 * Logs with [Log4php](https://logging.apache.org/log4php/).
 */
class Log4php extends CI_Controller {

    /**
     * Logs INFO msg to file application/logs/apache-log4php.log
     * (as defined in /apache-log4php/info.xml)
     */
    public function index() {
        $start_time = microtime(TRUE);
        echo "Log4php file...<br>\n";
        $logger = Logger::getLogger("main");
        Logger::configure('apache-log4php/default-file.xml');
        $logger->info('Info Message (Log4php)');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    /**
     * Logs using the system logger.
     */
    public function syslog() {
        $start_time = microtime(TRUE);
        echo "Log4php SYSLOG...<br>\n";
        $logger = Logger::getLogger("main");
        Logger::configure('./apache-log4php/default-syslog.xml');
        $logger->info('Info Message (Log4php SYSLOG)');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

}
