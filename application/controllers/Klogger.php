<?php defined('BASEPATH') OR exit('No direct script access allowed');
require './klogger/vendor/autoload.php';

class Klogger extends CI_Controller {
	public function index()
	{
		$start_time = microtime(TRUE);
    $users = [
        [
            'name' => 'Kenny Katzgrau',
            'username' => 'katzgrau',
        ],
        [
            'name' => 'Dan Horrigan',
            'username' => 'dhrrgn',
        ],
    ];

    $logger = new Katzgrau\KLogger\Logger('./application/logs');
    $logger->error('Error Message');
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function debug()
	{
		$start_time = microtime(TRUE);
    $users = [
        [
            'name' => 'Kenny Katzgrau',
            'username' => 'katzgrau',
        ],
        [
            'name' => 'Dan Horrigan',
            'username' => 'dhrrgn',
        ],
    ];

    $logger = new Katzgrau\KLogger\Logger('./application/logs');
    $logger->debug('Debug Message');
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function warning()
	{
		$start_time = microtime(TRUE);
    $users = [
        [
            'name' => 'Kenny Katzgrau',
            'username' => 'katzgrau',
        ],
        [
            'name' => 'Dan Horrigan',
            'username' => 'dhrrgn',
        ],
    ];

    $logger = new Katzgrau\KLogger\Logger('./application/logs');
    $logger->warning('Warning Message');
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
	public function info()
	{
		$start_time = microtime(TRUE);
    $users = [
        [
            'name' => 'Kenny Katzgrau',
            'username' => 'katzgrau',
        ],
        [
            'name' => 'Dan Horrigan',
            'username' => 'dhrrgn',
        ],
    ];

    $logger = new Katzgrau\KLogger\Logger('./application/logs');
    $logger->info('Info Message');
		$end_time = microtime(TRUE);
		echo $end_time - $start_time;
	}
}
