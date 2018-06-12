<?php defined('BASEPATH') OR exit('No direct script access allowed');
require './apache-log4php/vendor/autoload.php';

class Log4php extends CI_Controller {
	public function index()
	{
		$start_time = microtime(TRUE);
    Logger::configure('./apache-log4php/custom.xml');
    $logger = Logger::getLogger("main");
    $logger->error("Error Message");
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function debug()
	{
		$start_time = microtime(TRUE);
    Logger::configure('./apache-log4php/custom.xml');
    $logger = Logger::getLogger("main");
    $logger->debug("Debug Message");
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function warning()
	{
		$start_time = microtime(TRUE);
    Logger::configure('./apache-log4php/custom.xml');
    $logger = Logger::getLogger("main");
    $logger->warn("Warning Message");
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function info()
	{
		$start_time = microtime(TRUE);
    Logger::configure('./apache-log4php/custom.xml');
    $logger = Logger::getLogger("main");
    $logger->info("Info Message");
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
}
