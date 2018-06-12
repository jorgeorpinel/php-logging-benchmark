<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require './klogger/vendor/autoload.php';

use Katzgrau\KLogger\Logger;

/**
 * Logs with [Klogger](https://github.com/katzgrau/KLogger).
 */
class Klogger extends CI_Controller {

    /**
     * Logs to file in application/logs/
     */
    public function index() {
        $start_time = microtime(TRUE);
        echo "KLogger...<br>\n";
        $logger = new Logger('application/logs');
//        $logger->debug('Debug Message (KLogger)');
        $logger->info('Info Message (KLogger)');
//        $logger->notice('Notice Message (KLogger)');
//        $logger->warning('Warning Message (KLogger)');
//        $logger->error('Error Message (KLogger)');
//        $logger->critical('Critical Message (KLogger)');
//        $logger->alert('Alert Message (KLogger)');
//        $logger->emergency('Emergency Message (KLogger)');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

}
