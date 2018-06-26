<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'monolog/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Handler\SocketHandler;
use Monolog\Handler\SyslogUdpHandler;

/**
 * Logs with [Monolog](https://github.com/Seldaek/monolog).
 */
class Monolog extends CI_Controller {

    /**
     * Uses `$this->file()`.
     */
    public function index() {
        $this->file();
    }

    /**
     * Logs 10k INFO msgs to file application/logs/monolog.log
     */
    public function file() {
        $start_time = microtime(TRUE);
        echo "Monolog logs 10k INFO msgs to file .../monolog.log";
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('application/logs/monolog.log', Logger::INFO));
        for ($i = 1; $i <= 10000; $i++)
            $log->info('Info Message (Monolog)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

    /**
     * Logs 100k INFO msgs using the system logger.
     */
    public function syslog() {
        $start_time = microtime(TRUE);
        echo "Monolog logs 100k INFO msgs using the system logger";
        $log = new Logger('syslog');
        $log->pushHandler(new SyslogHandler('syslog', LOG_USER, Logger::INFO));
        for ($i = 1; $i <= 100000; $i++)
            $log->info('Info Message (Monolog SYSLOG)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

    /**
     * Logs 100k INFO msgs using Syslog via TCP.
     */
    public function syslog_tcp() {
        $start_time = microtime(TRUE);
        echo "Monolog logs 100k INFO msgs using Syslog via TCP";
        $log = new Logger('syslog');
        $handler = new SocketHandler('tcp://localhost:514/');
        $handler->setPersistent(true);
        $log->pushHandler($handler, Logger::INFO);
        for ($i = 1; $i <= 100000; $i++)
            $log->info('TCP Info Message (Monolog SYSLOG)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

    /**
     * Logs 100k INFO msgs using Syslog via UDP.
     */
    public function syslog_udp() {
        $start_time = microtime(TRUE);
        echo "Monolog logs 100k INFO msgs using Syslog via UDP";
        $log = new Logger('syslog');
        $log->pushHandler(new SyslogUdpHandler('localhost', 514, LOG_USER, $level = Logger::INFO));
        for ($i = 1; $i <= 100000; $i++)
            $log->info('UDP Info Message (Monolog SYSLOG)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

}
