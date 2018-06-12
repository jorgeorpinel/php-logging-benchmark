<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'apache-log4php/vendor/autoload.php';

/**
 * Logs with [Log4php](https://logging.apache.org/log4php/).
 */
class Log4php extends CI_Controller {

    /**
     * Uses `$this->file()`.
     */
    public function index() {
        $this->file();
    }

    /**
     * Logs 10k INFO msgs to file application/logs/apache-log4php.log
     * (as defined in /apache-log4php/info.xml)
     */
    public function file() {
        $start_time = microtime(TRUE);
        echo "Log4php logs 10k INFO msgs to file .../apache-log4php.log";
        $logger = Logger::getLogger("main");
        Logger::configure('apache-log4php/default-file.xml');
        for ($i = 1; $i <= 10000; $i++)
            $logger->info('Info Message (Log4php)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

    /**
     * Logs 100k INFO msgs using the system logger.
     */
    public function syslog() {
        $start_time = microtime(TRUE);
        echo "Log4php logs 100k INFO msgs using the system logger";
        $logger = Logger::getLogger("main");
        Logger::configure('./apache-log4php/default-syslog.xml');
        for ($i = 1; $i <= 100000; $i++)
            $logger->info('Info Message (Log4php SYSLOG)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

    /**
     * Logs 100k INFO msgs using Syslog via TCP.
     */
    public function syslog_tcp() {
        $start_time = microtime(TRUE);
        echo "Log4php logs 100k INFO msgs using Syslog via TCP";
        $logger = Logger::getLogger("main");
        Logger::configure('./apache-log4php/default-syslog-tcp.xml');
        for ($i = 1; $i <= 100000; $i++)
            $logger->info('Info Message (Log4php SYSLOG)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

    /**
     * Logs 100k INFO msgs using Syslog via UDP.
     */
    public function syslog_udp() {
        $start_time = microtime(TRUE);
        echo "Log4php logs 100k INFO msgs using Syslog via UDP";
        $logger = Logger::getLogger("main");
        Logger::configure('./apache-log4php/default-syslog-udp.xml');
        for ($i = 1; $i <= 100000; $i++)
            $logger->info('Info Message (Log4php SYSLOG)');
        $end_time = microtime(TRUE);
        echo ' in ' . ($end_time - $start_time) . ' ms.';
    }

}
