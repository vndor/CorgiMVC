<?php

namespace aphp\Foundation;

class SystemService 
{
	static function memoryUsageText($real = true) 
	{
		$size = memory_get_usage($real);
		$unit = array('b','kb','mb','gb','tb','pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2) . ' ' . $unit[$i];
	}

	static function sleep($seconds) 
	{
		usleep($seconds * 1000000);
	}
	
	static function isWindows() 
	{
		return (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
	}
}