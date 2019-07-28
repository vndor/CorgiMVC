<?php 

namespace aphp\Foundation;

class TimeService {
	use TraitSingleton; // trait

	function __construct() {
		$this->microtime = microtime(true);
	}

	public function getMicrotime() {
		return microtime(true) - $this->microtime;
	}
    
	public function getTimeText($time = 0) {
		if ($time == 0) {
			$time = time();
		}
		$date = date('G:i:s Y-m-d', $time);
		$text = sprintf('%s [%.3f]', $date, $this->getMicrotime());
		return $text;
	}
}