<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require './klogger/vendor/autoload.php';

use Katzgrau\KLogger\Logger;

/**
 * Logs with [Klogger](https://github.com/katzgrau/KLogger).
 */
class Klogger extends CI_Controller {

    /**
     * Uses `$this->file()`.
     */
    public function index() {
        $this->file();
    }

    /**
     * Logs 10k INFO msgs to KLogger's default file name in application/logs/
     */
    public function file() {
        $start_time = microtime(TRUE);
        echo "Logs 10k INFO msgs to KLogger's default file name";
        $logger = new Logger('application/logs');
        for ($i = 1; $i <= 10000; $i++)
            $logger->info('Info Message (KLogger)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

}
