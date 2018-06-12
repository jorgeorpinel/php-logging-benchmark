<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Native extends CI_Controller {
	public function index()
	{
		$start_time = microtime(TRUE);
		openlog('native', LOG_PID | LOG_PERROR, LOG_USER);
		syslog(LOG_ERR, "Error Message");
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function debug()
	{
		$start_time = microtime(TRUE);
		openlog('native', LOG_PID | LOG_PERROR, LOG_USER);
		syslog(LOG_DEBUG, "Debug Message");
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function warning()
	{
		$start_time = microtime(TRUE);
		openlog('native', LOG_PID | LOG_PERROR, LOG_USER);
		syslog(LOG_WARNING, "Warning Message");
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function info()
	{
		$start_time = microtime(TRUE);
		openlog('native', LOG_PID | LOG_PERROR, LOG_USER);
		syslog(LOG_INFO, "Info Message");
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
}
