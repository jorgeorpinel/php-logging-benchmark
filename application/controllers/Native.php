<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Logs with native PHP logging functions.
 * See https://secure.php.net/manual/en/ref.errorfunc.php
 */
class Native extends CI_Controller {

    /**
     * Logs ERROR using both default error_log and default syslog.
     */
    public function index() {
        $start_time = microtime(TRUE);
        // FIXME: Do something more intensive like calculating prime numbers?
        echo "error_log and syslog...<br>\n";
        // FIXME: Should probably do each in a subthread.
        error_log("PHP Error Message (error_log)");
//        syslog(LOG_DEBUG, "Debug Message (syslog)");
//        syslog(LOG_INFO, "Info Message (syslog)");
//        syslog(LOG_NOTICE, "Notice Message (syslog)");
//        syslog(LOG_WARNING, "Warning Message (syslog)");
        syslog(LOG_ERR, "Error Message (syslog)");
//        syslog(LOG_CRIT, "Critical Message (syslog)");
//        syslog(LOG_ALERT, "Alert Message (syslog)");
//        syslog(LOG_EMERG, "Emergency Message (syslog)");
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    /**
     * Logs 10k INFO msgs using `error_log`.
     * (Intended to be configured in php.ini to write to a file.)
     */
    public function error_log() {
        echo "Logs 10k INFO msgs using `error_log`";
        $start_time = microtime(TRUE);
        for ($i = 1; $i <= 10000; $i++)
            // FIXME: Do something else? Like calc. prime numbers
            error_log("PHP Error Message (error_log)");
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

    /**
     * Logs 100k INFO msgs using `syslog`.
     */
    public function syslog() {
        $start_time = microtime(TRUE);
        echo "Logs 100k INFO msgs using `syslog`";
        for ($i = 1; $i <= 100000; $i++)
            syslog(LOG_INFO, "Info Message (syslog)");
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

}
