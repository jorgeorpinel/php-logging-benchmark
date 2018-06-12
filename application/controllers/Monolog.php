<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'monolog/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Monolog extends CI_Controller {

    public function index() {
        $start_time = microtime(TRUE);
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('./application/logs/monolog.log', Logger::ERROR));
        $log->error('Error Message');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    public function debug() {
        $start_time = microtime(TRUE);
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('./application/logs/monolog.log', Logger::DEBUG));
        $log->debug('Debug Message');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    public function warning() {
        $start_time = microtime(TRUE);
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('./application/logs/monolog.log', Logger::WARNING));
        $log->warning('Warning Message');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    public function info() {
        $start_time = microtime(TRUE);
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('./application/logs/monolog.log', Logger::INFO));
        $log->info('Info Message');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

}
