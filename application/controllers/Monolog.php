<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'monolog/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Handler\SyslogUdpHandler;

/**
 * Logs with [Monolog](https://github.com/Seldaek/monolog).
 */
class Monolog extends CI_Controller {

    /**
     * Logs INFO msg to file application/logs/monolog.log
     */
    public function index() {
        $start_time = microtime(TRUE);
        echo "Monolog StreamHandler...<br>\n";
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('application/logs/monolog.log', Logger::INFO));
        $log->info('Info Message (Monolog)');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    /**
     * Logs using the system logger.
     */
    public function syslog() {
        $start_time = microtime(TRUE);
        echo "Monolog SyslogHandler...<br>\n";
        $log = new Logger('syslog');
        $log->pushHandler(new SyslogHandler('syslog', LOG_USER, Logger::INFO));
        $log->info('Info Message (Monolog)');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

    /**
     * Logs using the system logger via UDP.
     */
    public function syslog_udp() {
        $start_time = microtime(TRUE);
        echo "Monolog SyslogHandler...<br>\n";
        $log = new Logger('syslog');
        $log->pushHandler(new SyslogUdpHandler('localhost', 514, LOG_USER, $level=Logger::INFO));
        $log->info('UDP Info Message (Monolog)');
        $end_time = microtime(TRUE);
        echo $end_time - $start_time;
    }

}
