<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require './klogger/vendor/autoload.php';

class Klogger extends CI_Controller {

    public function index() {
        $start_time = microtime(TRUE);
        echo "KLogger...<br>\n";
        $logger = new Katzgrau\KLogger\Logger('./application/logs');
//        $logger->debug('Debug Message (KLogger)');
//        $logger->info('Info Message (KLogger)');
//        $logger->notice('Notice Message (KLogger)');
//        $logger->warning('Warning Message (KLogger)');
        $logger->error('Error Message (KLogger)');
//        $logger->critical('Critical Message (KLogger)');
//        $logger->alert('Alert Message (KLogger)');
//        $logger->emergency('Emergency Message (KLogger)');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

}
