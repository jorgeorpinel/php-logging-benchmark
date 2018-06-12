<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Native extends CI_Controller {

    public function index() {
        $start_time = microtime(TRUE);
        // FIXME: Do something more intensive like calculating prime numbers?
        echo "error_log and syslog...<br>\n";
        // FIXME: Should probably do each in a subthread.
        error_log("PHP Error Message (error_log)");
//		syslog(LOG_DEBUG, "Debug Message (syslog)");
//		syslog(LOG_INFO, "Info Message (syslog)");
//		syslog(LOG_NOTICE, "Notice Message (syslog)");
//		syslog(LOG_WARNING, "Warning Message (syslog)");
        syslog(LOG_ERR, "Error Message (syslog)");
//		syslog(LOG_CRIT, "Critical Message (syslog)");
//		syslog(LOG_ALERT, "Alert Message (syslog)");
//		syslog(LOG_EMERG, "Emergency Message (syslog)");
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    public function error_log() {
        $start_time = microtime(TRUE);
        // FIXME: Do something more intensive like calculating prime numbers?
        echo "error_log...<br>\n";
        error_log("PHP Error Message (error_log)");
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    public function syslog() {
        $start_time = microtime(TRUE);
        // FIXME: Do something more intensive like calculating prime numbers?
        echo "syslog...<br>\n";
        syslog(LOG_ERR, "Error Message (syslog)");
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

}
